<?php

// //======================>LOGIN ADMIN<==========================
// Route::group(['prefix' => 'login'], function () {
//     Route::group(['namespace' => '\Unicorn\Author\Http\Controllers'], function () {
//         Route::get('', 'LoginCoreController@getLogin')->name('admin.login');
//         Route::post('','LoginCoreController@postLogin')->name('post.login');
//     });
// });

   
Route::group(['middleware' => ['web', 'auth','CheckLogin']], function(){

    Route::group(['prefix' => 'admin'], function () {
        //====================> Home <============================
        Route::group(['namespace' => '\Unicorn\Author\Http\Controllers'], function () {
            Route::get('home', 'IndexController@getIndex');
        });
        //====================> Users <============================
        Route::group(['prefix' => 'users'], function () {
            Route::group(['namespace' => '\Unicorn\Author\Http\Controllers'], function () {
                Route::get('/', 'UserController@getListUser');
        
                Route::get('add', 'UserController@getAddUser');
                Route::post('add', 'UserController@postAddUser');
        
                Route::get('edit/{id}', 'UserController@getEditUser');
                Route::post('edit/{id}', 'UserController@postEditUser')->name('edit.users');
        
                Route::get('del/{id}','UserController@delUser');
        
                Route::get('logout','UserController@getLogout' );
            });
        });
        //====================> Role <============================
        Route::group(['prefix' => 'role'], function () {
            Route::group(['namespace' => 'Unicorn\Author\Http\Controllers'], function () {
        
                Route::get('/','RoleController@index')->name('role.index');
        
                Route::get('/add','RoleController@getCreate')->name('role.add');
                Route::post('/add','RoleController@postCreate')->name('role.store');
            
                Route::get('/edit/{id}','RoleController@getEdit')->name('role.edit.list');
                Route::post('/edit/{id}','RoleController@postEdit')->name('role.edit');
            
                Route::get('/del/{id}','RoleController@delete')->name('role.del');
            });
        });
        //====================> Product <============================
        Route::group(['prefix' => 'product'], function () {
            Route::group(['namespace' => 'Unicorn\Author\Http\Controllers'], function () {
                //====================> Product <============================
                Route::get('/','ProductController@getList')->name('prd.list');
        
                Route::get('/add','ProductController@getAdd')->name('prd.add');
                Route::post('/add','ProductController@postAdd')->name('prd.store');
            
                Route::get('/edit/{id}','ProductController@getEdit')->name('prd.edit.list');
                Route::post('/edit/{id}','ProductController@postEdit')->name('prd.edit');
            
                Route::get('/del/{id}','ProductController@getDel');

                //====================> Attribute <============================
                Route::get('list-attr', 'ProductController@getListAttr');

                Route::get('add-attr', 'ProductController@getAddAttr');
                Route::post('add-attr','ProductController@PostAddAttr');

                Route::get('edit-attr/{id}', 'ProductController@getEditAttr');
                Route::post('edit-attr/{id}', 'ProductController@postEditAttr');
                Route::get('del-attr/{id}', 'ProductController@postDelAttr');

                //====================> Values <============================
                route::get('add-value/{id}','ProductController@getAddValue');
                Route::post('add-value/{id}','ProductController@postAddValue');

                Route::get('edit-value/{id}', 'ProductController@getEditValue');
                Route::post('edit-value/{id}', 'ProductController@postEditValue');
                Route::get('del-value/{id}', 'ProductController@postDelValue');

                //====================> Variant <============================
                Route::get('add-variant/{id}', 'ProductController@AddVariant');
                Route::post('add-variant/{id}', 'ProductController@postAddVariant');

                Route::get('edit-variant/{id}', 'ProductController@EditVariant');
                Route::post('edit-variant/{id}', 'ProductController@postEditVariant');

                Route::get('del-variant/{id}', 'ProductController@DelVariant');
            });
        });
    });
});













