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
Route::group(['namespace' => '\Unicorn\Author\Http\Controllers'], function () {
    Route::get('login', 'LoginCoreController@getlogin');
    Route::post('login','LoginCoreController@postlogin');
    Route::get('logout','LoginCoreController@getLogout');
});

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
    //==============> Posts <=====================
    Route::resource('posts','PostsController');
    //==============> Posts <=====================
    Route::group(['prefix' => 'post'], function () {
        Route::get('/list', 'PostsController@getList');
        Route::post('/post', 'PostsController@postAdd');
        //--GET LINK TO EDIT--//
        Route::get('post/{link_id?}','PostsController@getEdit');
        
        //--UPDATE a link--//
        Route::put('/post/{link_id?}','PostsController@putEdit' );
        
        //--DELETE a link--//
        Route::delete('/post/{link_id?}','PostsController@delete');
    });
});
//--LOAD THE VIEW--//
Route::get('/', function () {
    $links = App\Models\Post::all();
    return view('laracrud')->with('links', $links);
});
 
//--CREATE a link--//
Route::post('/links', function (Request $request) {
    $link = App\Models\Post::create($request->all());
    return Response::json($link);
});
 
//--GET LINK TO EDIT--//
Route::get('/links/{link_id?}', function ($link_id) {
    $link = App\Models\Post::find($link_id);
    return Response::json($link);
});
 
//--UPDATE a link--//
Route::put('/links/{link_id?}', function (Request $request, $link_id) {
    $link = App\Models\Post::find($link_id);
    $link->url = $request->url;
    $link->description = $request->description;
    $link->save();
    return Response::json($link);
});
 
//--DELETE a link--//
Route::delete('/links/{link_id?}', function ($link_id) {
    $link = App\Models\Post::destroy($link_id);
    return Response::json($link);
});

Route::get('login1', 'LoginTestController@getList');
Route::post('login1', 'LoginTestController@postList');


