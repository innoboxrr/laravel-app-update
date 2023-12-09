<?php

namespace Innoboxrr\LaravelAppUpdate\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function register()
    {
        
        $this->mergeConfigFrom(__DIR__ . '/../../config/laravel-app-update.php', 'laravel-app-update');

    }

    public function boot()
    {
        
        // $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');

        // $this->loadViewsFrom(__DIR__.'/../../resources/views', 'innoboxrrlaravelappupdate');

        if ($this->app->runningInConsole()) {
            
            // $this->publishes([__DIR__.'/../../resources/views' => resource_path('views/vendor/innoboxrrlaravelappupdate'),], 'views');

            // $this->publishes([__DIR__.'/../../config/innoboxrrlaravelappupdate.php' => config_path('innoboxrrlaravelappupdate.php')], 'config');

        }

        $this->commands([
            \Innoboxrr\LaravelAppUpdate\Console\Commands\UpdateAppCommand::class,
        ]);

    }
    
}