<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);

        // ponytail: security — refuse to boot in production with debug enabled.
        // APP_DEBUG=true leaks stack traces + env values on any error, which can
        // expose APP_KEY / DB credentials and enable session-cookie forgery.
        // Upgrade: move to deploy-time CI check once one exists.
        if ($this->app->environment('production') && config('app.debug')) {
            $message = 'APP_DEBUG is enabled in a non-local environment. '
                .'Set APP_DEBUG=false in your .env before serving traffic.';
            // Log loudly so ops sees it, then fail closed.
            logger()->emergency($message);
            abort(503, $message);
        }
    }
}
