<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    // return redirect()->action('LoginFB@index');
    return view('welcome');
});

Route::get('login', 'LoginFB@index');


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

// Route::group(['middleware' => ['web']], function () {
// 	Route::get('home', 'Home@index');
// 	Route::get('login/facebook', 'FacebookController@login');
// 	Route::post('test', [
//         'uses' => 'LoginFB@index',
//         'as' => 'test',
//         'middleware' => 'auth'
//     ]);
// });

Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('login', 'LoginFB@index');
    Route::get('login/facebook', 'FacebookController@login');
    Route::get('onlogin', 'FacebookController@callback');
   	Route::get('home', [
        'uses' => 'HomeController@index',
        'as' => 'home',
        'middleware' => 'auth'
    ]);
});
