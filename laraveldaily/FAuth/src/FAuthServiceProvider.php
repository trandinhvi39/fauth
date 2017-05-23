<?php

namespace Laraveldaily\FAuth;

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
        include __DIR__.'/routes.php';
        $this->app->make('Laraveldaily\FAuth\FAuthController');
        $this->app->singleton('Laraveldaily\FAuth\Contracts\Factory', function ($app) {
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
        return ['Laraveldaily\FAuth\Contracts\Factory'];
    }
}
