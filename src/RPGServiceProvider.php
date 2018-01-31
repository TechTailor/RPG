<?php

namespace TechTailor\RPG;

use Illuminate\Support\ServiceProvider;

class RPGServiceProvider extends ServiceProvider
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
        $this->app->bind('rpg','\TechTailor\RPG\RPGController');
    }
}
