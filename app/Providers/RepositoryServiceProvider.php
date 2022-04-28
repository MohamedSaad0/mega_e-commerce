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
        $this->app->bind('App\Http\Interfaces\Api\CartInterface','App\Http\Repositories\Api\CartRepository');
        $this->app->bind('App\Http\Interfaces\Admin\OrderInterface','App\Http\Repositories\Admin\OrderRepository');

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
