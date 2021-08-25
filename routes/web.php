<?php
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

/**
 * Admin routes
 */
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});