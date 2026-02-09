<?php

namespace App\Http\Controllers;

use App\Models\Activation;
use App\Models\AuditLog;
use App\Models\License;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class LicenseController extends Controller
{
    /**
     * Bind a license key to a domain.
     * POST /v1/license/activate
     */
    public function activate(Request $request)
    {
        $ip = $request->ip();
        
        if ($this->isBlacklisted($ip)) {
            return response()->json(['error' => 'Access Denied: IP Blacklisted'], 403);
        }

        $this->validate($request, [
            'license_key' => 'required|string',
            'domain' => 'required|string',
            'wp_version' => 'string|nullable',
            'php_version' => 'string|nullable',
        ]);

        $key = $request->input('license_key');
        $domain = $this->sanitizeDomain($request->input('domain'));

        // 2. Find License
        $license = License::where('license_key', $key)->first();

        if (!$license) {
            $this->logAudit($key, $ip, 'fail_invalid', ['reason' => 'Key not found']);
            $this->incrementFailure($ip);
            return response()->json(['error' => 'Invalid License Key'], 404);
        }

        if ($license->status !== 'active') {
            $this->logAudit($key, $ip, 'fail_invalid', ['reason' => 'License ' . $license->status]);
            return response()->json(['error' => 'License ' . ucfirst($license->status)], 403);
        }

        if ($license->expires_at && $license->expires_at->isPast()) {
            $this->logAudit($key, $ip, 'fail_invalid', ['reason' => 'Expired']);
            return response()->json(['error' => 'License Expired'], 403);
        }

        // 3 & 4. Check Bindings & Race Condition
        // Use DB Transaction for row locking
        try {
            DB::beginTransaction();
            
            // Reload license with lock (if supported by DB, SQLite ignores sharedLock usually but works for simple atomic ops)
            // For robust mysql: License::where('id', $license->id)->lockForUpdate()->first();
            
            $activationCount = Activation::where('license_id', $license->id)->count();
            
            // Check if this domain is ALREADY activated
            $existing = Activation::where('license_id', $license->id)->where('domain', $domain)->first();
            
            if ($existing) {
                // Already active, just update checkin
                $existing->update([
                    'last_checkin_at' => now(),
                    'server_ip' => $ip,
                    'wp_version' => $request->input('wp_version'),
                    'php_version' => $request->input('php_version'),
                ]);
                DB::commit();
                return $this->signedResponse(['status' => 'valid', 'message' => 'License already active for this domain']);
            }

            if ($activationCount >= $license->activation_limit) {
                DB::rollBack();
                $this->logAudit($key, $ip, 'fail_limit', ['limit' => $license->activation_limit]);
                return response()->json(['error' => 'Activation Limit Reached'], 403);
            }

            // 5. Bind
            Activation::create([
                'license_id' => $license->id,
                'domain' => $domain,
                'server_ip' => $ip,
                'wp_version' => $request->input('wp_version'),
                'php_version' => $request->input('php_version'),
                'last_checkin_at' => now(),
            ]);
            
            $this->logAudit($key, $ip, 'activate', ['domain' => $domain]);
            
            DB::commit();
            
            return $this->signedResponse(['status' => 'valid', 'message' => 'Activation Successful']);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Server Error: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Daily heartbeat check.
     * POST /v1/license/check
     */
    public function check(Request $request)
    {
        $ip = $request->ip();
        
        $this->validate($request, [
            'license_key' => 'required|string',
            'domain' => 'required|string',
        ]);

        $key = $request->input('license_key');
        $domain = $this->sanitizeDomain($request->input('domain'));

        $license = License::where('license_key', $key)->first();

        if (!$license || $license->status !== 'active') {
             return $this->signedResponse(['status' => 'invalid', 'command' => 'deactivate']);
        }

        $activation = Activation::where('license_id', $license->id)
            ->where('domain', $domain)
            ->first();

        if (!$activation) {
            // Domain mismatch or not activated
            $this->logAudit($key, $ip, 'fail_check', ['domain' => $domain, 'reason' => 'Domain not bound']);
            return $this->signedResponse(['status' => 'invalid', 'command' => 'deactivate']);
        }

        // Valid
        $activation->update(['last_checkin_at' => now(), 'server_ip' => $ip]);
        $this->logAudit($key, $ip, 'check', ['domain' => $domain]);

        return $this->signedResponse(['status' => 'valid']);
    }

    /**
     * Deactivate license for a domain.
     * POST /v1/license/deactivate
     */
    public function deactivate(Request $request)
    {
        $ip = $request->ip();
        
        $this->validate($request, [
            'license_key' => 'required|string',
            'domain' => 'required|string',
        ]);

        $key = $request->input('license_key');
        $domain = $this->sanitizeDomain($request->input('domain'));

        $license = License::where('license_key', $key)->first();
        if (!$license) {
            return response()->json(['error' => 'Invalid License'], 404);
        }

        $activation = Activation::where('license_id', $license->id)
            ->where('domain', $domain)
            ->first();

        if ($activation) {
            $activation->delete();
            $this->logAudit($key, $ip, 'deactivate', ['domain' => $domain]);
        }

        return $this->signedResponse(['status' => 'deactivated']);
    }

    // --- Helpers ---

    private function sanitizeDomain($domain)
    {
        $domain = strtolower($domain);
        $domain = preg_replace('#^https?://#', '', $domain);
        $domain = preg_replace('#^www\.#', '', $domain);
        return rtrim($domain, '/');
    }

    private function logAudit($key, $ip, $action, $payload = [])
    {
        AuditLog::create([
            'license_key' => $key,
            'ip_address' => $ip,
            'action' => $action,
            'user_agent' => request()->header('User-Agent'),
            'payload' => $payload,
        ]);
    }

    private function isBlacklisted($ip)
    {
        try {
            // Check Redis for ban key
            return Redis::get("blacklist:$ip") ? true : false;
        } catch (\Exception $e) {
            // Fail open if Redis is down, or log error
            return false;
        }
    }

    private function incrementFailure($ip)
    {
        try {
            $key = "failures:$ip";
            $count = Redis::incr($key);
            if ($count == 1) {
                Redis::expire($key, 60); // 1 minute window
            }

            if ($count >= 10) {
                // Ban for 24 hours (86400 seconds)
                Redis::setex("blacklist:$ip", 86400, 'banned');
            }
        } catch (\Exception $e) {
            // Ignore redis errors
        }
    }

    /**
     * Generate Ed25519 Signed Response
     */
    private function signedResponse(array $data)
    {
        // Add timestamp to prevent response replay
        $data['timestamp'] = time();
        $payloadJson = json_encode($data);

        $privateKeyBase64 = env('SIDEQUEST_SIGNING_KEY');
        
        if (!$privateKeyBase64) {
            // Fallback for dev if key missing
            return response()->json([
                'payload' => $data,
                'signature' => 'DEV_MODE_NO_KEY',
                'warning' => 'SIDEQUEST_SIGNING_KEY not set in .env'
            ]);
        }

        try {
            $privateKey = base64_decode($privateKeyBase64);
            $signature = sodium_crypto_sign_detached($payloadJson, $privateKey);
            $signatureBase64 = base64_encode($signature);

            return response()->json([
                'payload' => $data,
                'signature' => $signatureBase64
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Signing Failed'], 500);
        }
    }
}
