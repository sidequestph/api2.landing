<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Arr;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Boot any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Add signedRoute macro to URL generator if not present
        if (!method_exists(app('url'), 'signedRoute')) {
            URL::macro('signedRoute', function ($name, $parameters = [], $expiration = null, $absolute = true) {
                $parameters = Arr::wrap($parameters);

                if (array_key_exists('signature', $parameters)) {
                    throw new \InvalidArgumentException(
                        'Parameters must not contain a "signature" key.'
                    );
                }

                if ($expiration) {
                    $parameters['expires'] = $expiration instanceof Carbon
                        ? $expiration->getTimestamp()
                        : $expiration;
                }

                ksort($parameters);

                $key = config('app.key');

                return $this->route($name, $parameters + [
                    'signature' => hash_hmac('sha256', $this->route($name, $parameters, $absolute), $key),
                ], $absolute);
            });
        }

        // Add hasValidSignature macro to Request (via URL generator or direct check)
        // Note: Request::hasValidSignature() calls $this->url()->hasValidSignature(...)
        // So we need to add hasValidSignature to the UrlGenerator as well.
        if (!method_exists(app('url'), 'hasValidSignature')) {
            URL::macro('hasValidSignature', function ($request, $absolute = true) {
                return $this->hasCorrectSignature($request, $absolute)
                    && $this->signatureHasNotExpired($request);
            });

            URL::macro('hasCorrectSignature', function ($request, $absolute = true) {
                $url = $absolute ? $request->url() : '/' . $request->path();
                $original = rtrim($url . '?' . Arr::query(
                    Arr::except($request->query(), 'signature')
                ), '?');

                $signature = $request->query('signature');
                $key = config('app.key');

                return hash_equals(hash_hmac('sha256', $original, $key), (string) $signature);
            });

            URL::macro('signatureHasNotExpired', function ($request) {
                $expires = $request->query('expires');

                return ! ($expires && Carbon::now()->getTimestamp() > $expires);
            });
        }
    }
}
