<?php

namespace Aysetas\ShortlyPackage;

use Aysetas\ShortlyPackage\Console\Commands\MakeConfigCommand;
use Aysetas\ShortlyPackage\Services\ShortlyService;
use Illuminate\Support\ServiceProvider;



class ShortlyServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('shortly', function ($app) {
            return new ShortlyService();
        });
    }

    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        if ($this->app->runningInConsole()) {
            $this->commands([
                MakeConfigCommand::class,
            ]);
        }
    }
}
