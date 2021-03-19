<?php

namespace Ezha\PurwantaraPHP;

use Illuminate\Support\ServiceProvider;

class PurwantaraPHPServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'ezha');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'ezha');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/purwantara.php', 'purwantara');

        // Register the service the package provides.
        $this->app->singleton('purwantaraphp', function ($app) {
            return new PurwantaraPHP;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['purwantaraphp'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/purwantaraphp.php' => config_path('purwantaraphp.php'),
        ], 'purwantaraphp.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/ezha'),
        ], 'purwantaraphp.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/ezha'),
        ], 'purwantaraphp.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/ezha'),
        ], 'purwantaraphp.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
