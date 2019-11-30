<?php

Route::group(['prefix' => 'admin'], function () {
    Route::group(['namespace' => '\Unicorn\Author\Http\Controllers'], function () {
        Route::get('home', 'IndexController@getIndex');
    });
    Route::group(['prefix' => 'login'], function () {
        Route::group(['namespace' => '\Unicorn\Author\Http\Controllers'], function () {
            Route::get('', 'LoginCoreController@getLogin')->name('admin.login');
            Route::post('','LoginCoreController@postLogin')->name('post.login');
        });
    });
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
});















