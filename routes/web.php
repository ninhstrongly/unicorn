<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['prefix' => 'admin','namespace'=>'admin'], function () {
    Route::group(['prefix' => 'options'], function () {
        Route::get('/','OptionsController@getMenu')->name('options');
        Route::post('/','OptionsController@postMenu');
        route::post('update','OptionsController@postUpdateMenu')->name('update.menu');
    });
});
