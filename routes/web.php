<?php
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return abort(401);
});

/**
 * Admin routes
 */
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});