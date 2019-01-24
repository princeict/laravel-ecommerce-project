<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use App\Category;
use App\Manufacturer;
use App\Product;

class AppServiceProvider extends ServiceProvider {

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        //View::share();
        
        View::composer('frontEnd.includes.menu', function($view) {
            $publishCategories = Category::where('publicationStatus', 1)->get();
            $view->with('publishCategories', $publishCategories);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }

}
