<?php

namespace App\Http\Middleware;

use Closure;

class CorsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $origin = $request->header('Origin');

        // Allow sidequestph.com or any subdomain of hostingersite.com
        $isAllowed = $origin === 'https://sidequestph.com' || 
                     preg_match('/^https?:\/\/([a-z0-9-]+\.)*hostingersite\.com$/', $origin);

        // Check if the origin is allowed
        if ($isAllowed) {
            // Handle Preflight OPTIONS requests
            if ($request->isMethod('OPTIONS')) {
                return response()->json('OK', 200, [
                    'Access-Control-Allow-Origin' => $origin,
                    'Access-Control-Allow-Methods' => 'POST, OPTIONS',
                    'Access-Control-Allow-Headers' => 'Content-Type, Authorization, X-Requested-With',
                ]);
            }

            // Process the request
            $response = $next($request);

            // Add CORS headers to the response
            $response->headers->set('Access-Control-Allow-Origin', $origin);
            $response->headers->set('Access-Control-Allow-Methods', 'POST, OPTIONS');
            $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, Authorization, X-Requested-With');

            return $response;
        }

        // If origin is not allowed or missing, reject it.
        return response()->json(['message' => 'Unauthorized Origin'], 403);
    }
}
