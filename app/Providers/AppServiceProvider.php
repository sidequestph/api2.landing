<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Routing\UrlGenerator;
use Illuminate\Http\Request;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('url', function ($app) {
            return new UrlGenerator($app);
        });
    }

    /**
     * Boot any application services.
     *
     * @return void
     */
    public function boot()
    {
        Request::macro('hasValidSignature', function ($absolute = true) {
            return app('url')->hasValidSignature($this, $absolute);
        });
    }
}
