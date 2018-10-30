<?php

namespace Webdeveloperpcpl\Test;

use Illuminate\Support\ServiceProvider;
use Webdeveloperpcpl\Test\Console\Commands\UnpackArchive;

class ConsoleServiceProvider extends ServiceProvider
{
    protected $defer = false;

    /**
     * The available commands
     *
     * @var array
     */
    protected $commands = [
        UnpackArchive::class,
    ];

    /**
     * Register the commands.
     */
    public function register()
    {
        $this->commands($this->commands);
        $this->app->make('Webdeveloperpcpl\Test\TestController');
    }

    /**
     * @return array
     */
    public function provides()
    {
        $provides = $this->commands;

        return $provides;
    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->loadMigrationsFrom(__DIR__.'/migrations');
        $this->loadViewsFrom(__DIR__.'/views', 'test');
        $this->publishes([
            __DIR__.'/views' => base_path('resources/views/webdeveloperpcppl/test'),
        ]);
        $this->publishes([
            __DIR__.'/assets' => public_path('vendor/test'),
        ], 'public');
    }
}
