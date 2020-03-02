<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
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
        Route::group(['prefix' => 'menu'], function () {
            Route::get('/','OptionsController@getMenu')->name('options');
            Route::post('/','OptionsController@postMenu');
            route::post('update','OptionsController@postUpdateMenu')->name('update.menu');
        });
    });
    Route::group(['prefix' => 'category'], function () {
        Route::get('/','CategoryController@getAdd');
        Route::post('/','CategoryController@postAdd');
        Route::get('edit/{id}','CategoryController@getEdit');
        Route::post('edit/{id}','CategoryController@postEdit');
        Route::get('del/{id}','CategoryController@getDel');
    });
    Route::resource('posts','PostsController');

    Route::group(['prefix' => 'setup_crontab','as'=>'setup.'], function () {
        Route::get('', 'SetupCrontabController@index');
        Route::get('shopee', 'SetupCrontabController@getShopee');
        Route::post('shopee', 'SetupCrontabController@saveShopee')->name('crontab.shopee');
        Route::post('change_status','SetupCrontabController@change_status')->name('crontab.change_status');

        Route::post('run',function(Request $r){
            if($r->check == 1){
                Artisan::queue('schedule:run');
            }
        })->name('crontab.run');
    });

    Route::group(['prefix' => 'chat'], function () {
        Route::get('', 'ChatroomController@index');

    });
});

Route::group(['namespace' => '\Unicorn\Author\Http\Controllers'], function () {
    Route::get('login', 'LoginCoreController@getlogin');
    Route::post('login','LoginCoreController@postlogin');
    Route::get('logout','LoginCoreController@getLogout');
});

Route::get('test','TestController@test');

