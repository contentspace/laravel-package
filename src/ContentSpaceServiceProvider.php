<?php

namespace ContentSpace;

use Illuminate\Support\ServiceProvider;
use ContentSpace\Commands\ContentSpace;

class ContentSpaceServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/Routes/content-space.php');
        $this->loadMigrationsFrom(__DIR__ . '/Database/migrations');
        $this->loadTranslationsFrom(__DIR__ . '/Translations', 'content-space');
        $this->loadViewsFrom(__DIR__ . '/Views', 'content-space');
        $this->publishes([__DIR__ . '/Assets' => public_path('vendor/content-space'),], 'public');
        if ($this->app->runningInConsole())
        {
            $this->commands([
                // Commands\CreateParameter::class,
                // Commands\InitParameter::class,
                // Commands\AssignParameter::class,
            ]);
        }   
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('content-space', 'ContentSpace');

        $config = __DIR__ . '/Config/content-space.php';
        $this->mergeConfigFrom($config, 'content-space');

        $this->publishes([__DIR__ . '/Config/content-space.php' => config_path('content-space.php')], 'config');

        $this->publishes([
            __DIR__ . '/Translations' => resource_path('lang/vendor/content-space'),
        ]);

        $this->publishes([
            __DIR__ . '/Views' => resource_path('views/vendor/content-space'),
        ]);

        $this->publishes([
            __DIR__ . '/Assets' => public_path('vendor/content-space'),
        ], 'public');

        $this->publishes([
            realpath(__DIR__ . '/Database/Migrations') => $this->app->databasePath() . '/migrations',
        ], 'migrations');
    }
}