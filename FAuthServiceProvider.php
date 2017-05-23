<?php

namespace Trandinhvi39\Fauth;

use Illuminate\Support\ServiceProvider;

class FAuthServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('Trandinhvi39\Fauth\Contracts\Factory', function ($app) {
            return new FAuthManager($app);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['Trandinhvi39\Fauth\Contracts\Factory'];
    }
}
