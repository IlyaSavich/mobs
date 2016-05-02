<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::auth();
    Route::get('/', ['uses' => 'HomeController@index', 'as' => 'index']);

    Route::group(['namespace' => 'Admin'], function () {
        Route::get('admin', ['uses' => 'AdminController@index', 'as' => 'index']);
        
        Route::get('admin/category', ['uses' => 'CategoryController@index', 'as' => 'category.list']);
        Route::get('admin/category/create', ['uses' => 'CategoryController@create', 
            'as' => 'category.create']);
        Route::post('admin/category/create', ['uses' => 'CategoryController@store',
            'as' => 'category.store']);
        Route::get('admin/category/update/{category}', ['uses' => 'CategoryController@edit',
            'as' => 'category.edit']);
        Route::post('admin/category/update/{id}', ['uses' => 'CategoryController@update',
            'as' => 'category.update']);
        Route::get('admin/category/delete/{id}', ['uses' => 'CategoryController@delete',
            'as' => 'category.delete']);
        
        Route::get('admin/product', ['uses' => 'ProductController@index', 'as' => 'product.list']);
        Route::get('admin/product/create', ['uses' => 'ProductController@create',
            'as' => 'product.create']);
    });


});