<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//just for testing purpose
Route::get('/', ['uses' => 'LoginController@getLoginForm', 'as' => 'login']);
//just for testing purpose

Route::group(['prefix' => 'page', 'middleware' => 'login'], function () {
    Route::post('saveProduct', ['uses' => 'ProductController@postSaveProduct', 'as' => 'saveProduct']);

    //just for testing purpose
    Route::get('welcome', ['uses' => 'LoginController@getWelcomePage', 'as' => 'welcome']);
    //just for testing purpose
});

Route::get('registerUser', ['uses' => 'UserController@postRegisterUser', 'as' => 'registerUser']);
Route::post('loginAuth', ['uses' => 'LoginController@getAuthentication', 'as' => 'loginAuth']);
Route::get('logout', ['uses' => 'LoginController@logOut', 'as' => 'logout']);
