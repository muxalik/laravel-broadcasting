<?php

namespace App\Providers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('dashboard', function ($view) {
            $view->with([
                'orders' => Order::with('products', 'user')->get(),
                'products' => Product::with('orders')->get(),
                'users' => User::with('orders')->get(),
            ]);
        });
    }
}
