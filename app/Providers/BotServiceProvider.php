<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Library\Services\Bot;

class BotServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind('App\Library\Services\Bot', function ($app) {
                  return new Bot();
                });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
