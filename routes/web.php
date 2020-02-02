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
//login
Route::get('/', 'Admin\AuthController@login_view');
Route::post('/login', 'Admin\AuthController@Do_login')->name('auth.login');
Route::post('logout', 'Auth\LoginController@logout')->name('auth.logout');
//Route::get('/users/edit/{id}', ['as' => 'users.edit', 'uses' => 'Admin\UsersController@edit']);

// Social Auth
Route::get('auth/social', 'Auth\SocialAuthController@show')->name('social.login');
Route::get('oauth/{driver}', 'Auth\SocialAuthController@redirectToProvider')->name('social.oauth');
Route::get('oauth/{driver}/callback', 'Auth\SocialAuthController@handleProviderCallback')->name('social.callback');

Route::group(['prefix'=>'Admin','middleware' => 'auth'], function () {


    //Route::resource('ajaxproducts','Admin\StaffController');
    //new
    Route::resource('ajax-crud', 'Admin\StaffController');

    Route::post('ajax-crud/update', 'Admin\StaffController@update')->name('ajax-crud.update');

    Route::get('ajax-crud/destroy/{id}', 'Admin\StaffController@destroy');
    //new
    Route::get('/', ['as' => 'admin.home', 'uses' => 'Admin\DashboardController@index']);
    //Branches
    Route::get('/Admin/users/edit/{id}', ['as' => 'users.edit', 'uses' => 'Admin\UsersController@edit']);
    Route::group(['prefix' => 'users'], function () {
        Route::get('/', ['as' => 'users', 'uses' => 'Admin\UsersController@index']);
        Route::get('/create', ['as' => 'users.create', 'uses' => 'Admin\UsersController@create']);
        Route::post('/store', ['as' => 'users.store', 'uses' => 'Admin\BranchesController@store']);
        Route::get('/edit/{id}', ['as' => 'users.edit', 'uses' => 'Admin\UsersController@edit']);
        Route::post('/update/{id}', ['as' => 'users.update', 'uses' => 'Admin\UsersController@update']);
        Route::post('/destroy/{id}', ['as' => 'users.destroy', 'uses' => 'Admin\UsersController@destroy']);

    });

});