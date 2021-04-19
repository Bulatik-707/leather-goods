<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//https://github.com/VladislavGroniuk/LaravelShop/commit/d36cb2cd46d682202ecb482d4ca2a2406c80191f
use App\Http\Controllers\CartController;
use Illuminate\Pagination\LengthAwarePaginator;
use Darryldecode\Cart\Cart;
//
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
