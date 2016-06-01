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
        Route::get('admin', ['uses' => 'AdminController@index', 'as' => 'admin']);

        Route::group(['prefix' => 'admin/category'], function () {
            Route::get('/', [
                'uses' => 'CategoryController@index',
                'as' => 'category.list',
            ]);
            Route::get('create', [
                'uses' => 'CategoryController@create',
                'as' => 'category.create',
            ]);
            Route::post('create', [
                'uses' => 'CategoryController@store',
                'as' => 'category.store',
            ]);
            Route::get('edit/{id}', [
                'uses' => 'CategoryController@edit',
                'as' => 'category.edit',
            ]);
            Route::post('update/{id}', [
                'uses' => 'CategoryController@update',
                'as' => 'category.update',
            ]);
            Route::get('delete/{id}', [
                'uses' => 'CategoryController@delete',
                'as' => 'category.delete',
            ]);
            Route::get('properties/{id}', [
                'uses' => 'CategoryController@properties',
                'as' => 'category.properties',
            ]);
        });

        Route::group(['prefix' => 'admin/product'], function () {
            Route::get('/', [
                'uses' => 'ProductController@index',
                'as' => 'product.list',
            ]);
            Route::get('create', [
                'uses' => 'ProductController@create',
                'as' => 'product.create',
            ]);
            Route::post('create', [
                'uses' => 'ProductController@store',
                'as' => 'product.store',
            ]);
            Route::get('edit/{id}', [
                'uses' => 'ProductController@edit',
                'as' => 'product.edit',
            ]);
            Route::post('update/{id}', [
                'uses' => 'ProductController@update',
                'as' => 'product.update',
            ]);
            Route::get('delete/{id}', [
                'uses' => 'ProductController@delete',
                'as' => 'product.delete',
            ]);
        });

        Route::group(['prefix' => 'admin/property'], function () {
            Route::get('/', [
                'uses' => 'PropertyController@index',
                'as' => 'property.list',
            ]);
            Route::get('create', [
                'uses' => 'PropertyController@create',
                'as' => 'property.create',
            ]);
            Route::post('create', [
                'uses' => 'PropertyController@store',
                'as' => 'property.store',
            ]);
            Route::get('edit/{property}', [
                'uses' => 'PropertyController@edit',
                'as' => 'property.edit',
            ]);
            Route::post('update/{id}', [
                'uses' => 'PropertyController@update',
                'as' => 'property.update',
            ]);
            Route::get('delete/{id}', [
                'uses' => 'PropertyController@delete',
                'as' => 'property.delete',
            ]);
        });
    });
});