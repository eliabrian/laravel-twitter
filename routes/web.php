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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Profile
Route::get('/profile/{user}', 'ProfileController@show')->name('profile.show');
Route::get('/profile/{user}/edit', 'ProfileController@edit')->name('profile.edit')->middleware('auth');;
Route::patch('/profile/{user}', 'ProfileController@update')->name('profile.update')->middleware('auth');

//Status
Route::post('/status', 'StatusController@store');
Route::get('/status/create', 'StatusController@create')->middleware('auth');
Route::get('/status/{status}', 'StatusController@show');
