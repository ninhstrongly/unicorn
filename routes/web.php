<?php
use Illuminate\Support\Facades\Auth;
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
Route::group(['prefix' => 'admin','namespace'=>'admin','middleware'=>'CheckLogin'], function () {
    Route::group(['prefix' => 'options'], function () {
        Route::get('/','OptionsController@getMenu')->name('options');
        Route::post('/','OptionsController@postMenu');
        route::post('update','OptionsController@postUpdateMenu')->name('update.menu');
    });
});

Route::group(['prefix' => ''], function () {
    Route::group(['namespace' => '\Unicorn\Author\Http\Controllers'], function () {
        Route::get('login', 'logincorecontroller@getlogin')->name('admin.login');
        Route::post('login','logincorecontroller@postlogin')->name('post.login');
        Route::get('logout','logincorecontroller@getLogout');
    });
});
