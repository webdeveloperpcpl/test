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
    }

    /**
     * @return array
     */
    public function provides()
    {
        $provides = $this->commands;

        return $provides;
    }
}
