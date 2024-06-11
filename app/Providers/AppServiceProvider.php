<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Observers\ProductCategoryObserver;
use App\Observers\ProductObserver;
use Illuminate\Support\Facades\View;
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
        View::composer(
            ['*'], 'App\Http\View\Composers\FrontPageComposer'
        );
//        Product::observe(ProductObserver::class);
//        ProductCategory::observe(ProductCategoryObserver::class);
    }
}
