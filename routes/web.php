<?php
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return abort(401);
});

Route::group(
/**
 *
 */ ['prefix' => 'admin'], function () {
    Voyager::routes();
});


/**
 * @api API routes list
 */
Route::namespace('API')->group(function () {

    /**
     * @api Settings routes
     */
    Route::prefix('settings')->name('settings')->group(function () {
        Route::get('by-group', 'SettingController@getSettingsByGroup')->name('.group');
        Route::get('by-group-keys', 'SettingController@getSettingsByGroupAndKeys')->name('.group.keys');
    });

});