<?php

namespace App\Providers;
use Illuminate\Pagination\Paginator;

use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //    Paginator::useBootstrap();
    }

    /**
     * Bootstrap any application services.
     */
   public function boot(): void
{
        Paginator::useBootstrap();
   if (Schema::hasTable('categories')) {
       View::share('categories', Category::orderBy('name')->get());
   }
}
}