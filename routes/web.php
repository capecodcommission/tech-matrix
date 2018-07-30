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

// Route::get('testing', 'TestController@test');
// need to add /admin to this URL and make sure people are logged in
Route::get('technologies/editRelationships/{technology}', 'TechnologyController@editRelationships');
Route::post('technologies/updateRelationships', 'TechnologyController@updateRelationships');
Route::get('technologies/editFormulas/{technology}', 'TechnologyController@editFormulas');
Route::post('technologies/updateFormulas', 'TechnologyController@updateFormulas');
Route::get('technologies/costs', 'TechnologyController@view_costs');

Route::get('technologies/test/{id}', 'TechnologyController@test_formula');
Route::resource('technologies', 'TechnologyController');
Route::resource('inputs', 'InputController');
Route::resource('input_groups', 'InputGroupController');
Route::get('notes/restore/{note}', 'NoteController@restore');
Route::resource('notes', 'NoteController');

Route::resource('formulas', 'FormulaController');

Route::get('users/restore/{user}', 'UserController@restore');
Route::resource('users', 'UserController');

Route::get('export', 'ExportController@exportAll')->name('export');

Route::get('/home', 'HomeController@index')->name('home');
