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

Route::get('/', function () {
    return view('welcome');
});

Route::match(['get', 'post'],'/contact/input', ['as' => 'input', 'uses' => 'ContactController@input']);

Route::post('/contact/confirm', ['as' => 'confirm', 'uses' => 'ContactController@confirm']);

Route::post('/contact/complete', ['as' => 'complete', 'uses' => 'ContactController@complete']);



// register
Route::get('/admin/register', ['as' => 'register', 'uses' => 'Auth\RegisterController@showRegistrationFormn']);
Route::post('/admin/register', ['as' => 'register', 'uses' => 'Auth\RegisterControlle@login']);
// login
Route::get('/admin/login', ['as' => '.login', 'uses' => 'Auth\LoginController@showLoginForm']);
Route::post('/admin/login', ['as' => '.login', 'uses' => 'Auth\LoginController@LoginForm']);


// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
