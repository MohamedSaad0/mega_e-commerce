<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind('App\Http\Interfaces\Admin\ProductInterface','App\Http\Repositories\Admin\ProductRepository');
        $this->app->bind('App\Http\Interfaces\Api\ProductInterface','App\Http\Repositories\Api\ProductRepository');
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
