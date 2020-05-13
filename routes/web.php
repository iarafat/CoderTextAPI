<?php
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return abort(401);
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
