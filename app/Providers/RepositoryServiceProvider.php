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
        $this->app->bind('App\Http\Interfaces\Admin\SellerInterface','App\Http\Repositories\Admin\SellerRepository');
        $this->app->bind('App\Http\Interfaces\Api\SellerInterface','App\Http\Repositories\Api\SellerRepository');
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
