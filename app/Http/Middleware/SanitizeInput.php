<?php

namespace App\Http\Middleware;

use Closure;

class SanitizeInput
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
        $input = $request->all();

        $request->merge($this->sanitize($input));

        return $next($request);
    }

    /**
     * Sanitize the input array recursively.
     *
     * @param  array  $input
     * @return array
     */
    private function sanitize(array $input)
    {
        foreach ($input as $key => $value) {
            if (is_string($value)) {
                // Strip HTML tags and trim whitespace
                $input[$key] = trim(strip_tags($value));
            } elseif (is_array($value)) {
                $input[$key] = $this->sanitize($value);
            }
        }

        return $input;
    }
}
