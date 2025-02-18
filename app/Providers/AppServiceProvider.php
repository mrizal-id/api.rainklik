<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;

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
        View::composer('partials.header', function ($view) {
            // Get parent categories
            $categories = Category::whereNull('parent_id')->get();

            // Pass parent categories and child categories grouped by parent_id
            $categoryTree = Category::all()->groupBy('parent_id');

            $view->with('categories', $categories)
                ->with('categoryTree', $categoryTree);
        });
    }
}
