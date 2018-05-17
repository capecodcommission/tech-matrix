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

Route::get('testing', 'TestController@test');
// need to add /admin to this URL and make sure people are logged in
Route::resource('technologies', 'TechnologyController');

Route::get('/home', 'HomeController@index')->name('home');
