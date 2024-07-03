<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\ServiceProvider;
use App\Helper\Cart;

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
        view()->composer('*', function ($view) {
            $view->with('cart', new Cart());
        });

        view()->composer([
            'fe.home',
            'fe.category_product',
            'fe.detail'
        ], function ($view) {
            $categories = Category::with('children')->whereNull('parent_id')->orderBy('name', 'ASC')->get();
            $view->with('categories', $categories);
        });
    }
}
