<?php

namespace App\Providers;

use App\Core\category\CategoryInterface;
use App\Core\category\CategoryRepo;
use App\Core\order\OrderInterface;
use App\Core\order\OrderRepo;
use App\Core\products\ProductInterface;
use App\Core\products\ProductRepo;
use App\Core\review\ProductReviewInterface;
use App\Core\review\ProductReviewRepo;
use App\Core\user\userInterface;
use App\Core\user\userRepo;
// use App\Http\View\Composers\CategoryComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
       $this->app->bind(ProductInterface::class, ProductRepo::class);
       $this->app->bind(CategoryInterface::class, CategoryRepo::class);
       $this->app->bind(ProductReviewInterface::class, ProductReviewRepo::class);
       $this->app->bind(OrderInterface::class, OrderRepo::class);
       
       $this->app->bind(userInterface::class, userRepo::class);
    }

    /**
     * Bootstrap any application services.
     */
    // public function boot(): void
    // {
    //     View::composer('*', CategoryComposer::class);
    // }
}
