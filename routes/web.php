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
    Route::group(['prefix' => 'category'], function () {
        Route::get('','CategoryController@getCategory');
        Route::post('','CategoryController@postCategory');

        Route::get('edit/{id}','CategoryController@getedit');
        Route::post('edit/{id}','CategoryController@postedit');

        Route::get('del/{id}','CategoryController@getdel');
    });
    
});
Route::group(['prefix' => 'login','namespace'=>'admin'], function () {
    Route::get('', 'LoginuserController@getLogin');
    Route::post('','LoginuserController@postLogin');
});
