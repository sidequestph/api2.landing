<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class FortressSecurityMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // 1. Force JSON
        if (!$request->wantsJson()) {
            return response()->json(['error' => 'Format Not Supported: JSON required'], 406);
        }

        // 2. User-Agent Check (The Bouncer)
        $agent = $request->header('User-Agent');
        if ($agent !== 'SideQuest-Hub/1.0') {
            // Log this attempt? Maybe later in AuditLog
            return response()->json(['error' => 'Unauthorized Agent'], 403);
        }

        // 3. Replay Attack Prevention (Timestamp check)
        // Request body MUST contain 'request_timestamp'
        $requestTimestamp = $request->input('request_timestamp');

        if (!$requestTimestamp) {
            return response()->json(['error' => 'Missing security timestamp'], 400);
        }

        // Allow 5 minutes drift (300 seconds)
        if (abs(time() - $requestTimestamp) > 300) {
            return response()->json(['error' => 'Request expired (Replay Attack Detected)'], 401);
        }

        return $next($request);
    }
}
