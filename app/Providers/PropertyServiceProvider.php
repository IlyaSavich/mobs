<?php

namespace App\Providers;

use App\Http\ViewComposers\InputFieldTypesComposer;
use App\Http\ViewComposers\PropertyGroupTypeComposer;
use App\Http\ViewComposers\PropertyTableDataComposer;
use Illuminate\Support\ServiceProvider;

class PropertyServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['admin.property.list',
            'admin.category.create', 'admin.category.edit',
        ], PropertyTableDataComposer::class);
        
        view()->composer(['admin.property.create', 'admin.property.edit',],
            InputFieldTypesComposer::class);
        view()->composer(['admin.property.create', 'admin.property.edit',],
            PropertyGroupTypeComposer::class);
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
