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
