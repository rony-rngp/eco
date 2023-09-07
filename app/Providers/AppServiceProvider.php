<?php

namespace App\Providers;

use App\Model\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        $categories = Category::with(['subcategories'])->where('status',1)->get();
        View::share([ 'categories' => $categories ]);
    }
}
