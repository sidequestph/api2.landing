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
        $allowedOrigins = [
            'https://sidequestph.com',
            'https://saddlebrown-peafowl-357277.hostingersite.com'
        ];
        $origin = $request->header('Origin');

        // Check if the origin is allowed
        if (in_array($origin, $allowedOrigins)) {
            // Handle Preflight OPTIONS requests
            if ($request->isMethod('OPTIONS')) {
                return response()->json('OK', 200, [
                    'Access-Control-Allow-Origin' => $origin,
                    'Access-Control-Allow-Methods' => 'GET, POST, PUT, DELETE, OPTIONS',
                    'Access-Control-Allow-Headers' => 'Content-Type, Authorization, X-Requested-With',
                ]);
            }

            // Process the request
            $response = $next($request);

            // Add CORS headers to the response
            $response->headers->set('Access-Control-Allow-Origin', $origin);
            $response->headers->set('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
            $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, Authorization, X-Requested-With');

            return $response;
        }

        // If origin is not allowed or missing (and strict mode is implied), reject it.
        // However, standard CORS usually just doesn't return the headers.
        // But the user said "all other request will be ignored".
        // Returning 403 Forbidden is a safe way to "ignore" or reject processing.
        return response()->json(['message' => 'Unauthorized Origin'], 403);
    }
}
