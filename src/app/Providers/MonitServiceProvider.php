<?php

namespace Laragopl\LaravelMonit\app\Providers;

use Illuminate\Support\ServiceProvider;

class MonitServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any package services.
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../../config/monit.php' => config_path('monit.php'),
        ], ['monit', 'monit-config']);
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../../config/monit.php',
            'monit'
        );
    }
}
