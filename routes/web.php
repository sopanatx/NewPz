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
//Main
Route::get('/', 'MainController@index');
Route::get('/forbidden', 'MainController@Forbidden');
//Change Pass
Route::get('change-password', function() {return view('auth.change-password'); });
Route::post('change-password', 'Auth\UpdatePasswordController@update');

Route::get('/redirect', 'SocialAuthController@redirect');
Route::get('/callback', 'SocialAuthController@callback');

Auth::routes();

Route::get('/clients/home', 'HomeController@index')->name('home');
Route::get('/clients/dedicated', 'HomeController@dedicated');

Route::group(['middleware' => ['auth', 'admin']], function ()
  {
      Route::get('/admin', 'AdminController@index');
  });