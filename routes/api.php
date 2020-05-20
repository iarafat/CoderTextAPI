<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

/**
 * @api Settings routes
 */
Route::prefix('settings')->name('settings')->group(function () {

    Route::get('by-group', 'SettingController@getSettingsByGroup')->name('.group');
    Route::get('by-group-keys', 'SettingController@getSettingsByGroupAndKeys')->name('.group.keys');
    Route::get('menus', 'SettingController@getMenusByName')->name('.menus');

});

/**
 * @api Categories routes
 */
Route::prefix('categories')->name('categories')->group(function () {

    Route::get('/', 'CategoryController@getCategoriesByLimit');
    Route::get('/posts', 'CategoryController@getCategoryWithPosts')->name('.posts');
    Route::get('/products', 'CategoryController@getCategoryWithProducts')->name('.products');

});

/**
 * @api Products routes
 */
Route::prefix('products')->name('products')->group(function () {

    Route::get('/', 'ProductController@index');
    Route::get('/{slug}', 'ProductController@show');

});

/**
 * @api Posts routes
 */
Route::prefix('posts')->name('posts')->group(function () {

    Route::get('/', 'PostController@index');
    Route::get('/{slug}', 'PostController@show');

});
