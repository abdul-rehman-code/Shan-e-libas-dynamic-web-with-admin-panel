<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\Cache;
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
        try {
            // Categories ko 24 ghante ke liye Cache mein save karein
            // Direct boot method mein share karne se cache query pure request mein sirf 1 BAAR chalegi
            $categories = Cache::remember('global_categories', 86400, function () {
                return Category::withCount('products')->get();
            });

            View::share('categories', $categories);
        } catch (\Exception $e) {
            View::share('categories', collect());
        }
    }
}