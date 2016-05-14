<?php

namespace App\Providers;

use App\Http\ViewComposers\CategoryListComposer;
use App\Http\ViewComposers\CategoryTableDataComposer;
use App\Http\ViewComposers\CategoryTreeComposer;
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
        view()->composer(['admin.category.create', 'admin.category.edit',
            'admin.product.create', 'admin.product.edit'
        ], CategoryListComposer::class);

        view()->composer(['admin.category.list'], CategoryTreeComposer::class);
        view()->composer(['admin.category.list'], CategoryTableDataComposer::class);
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
