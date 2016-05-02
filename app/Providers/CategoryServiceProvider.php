<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CategoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['admin.category.create', 'admin.category.edit'],
            'App\Http\ViewComposers\CategoryListComposer');

        view()->composer(['admin.category.list'], 'App\Http\ViewComposers\CategoryTreeComposer');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
