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
//admin::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/about', 'HomeController@index')->name('home');
Route::get('/blog', 'BlogController@index')->name('blog/create');

Route::get('/project_home', 'ProjectController@index')->name('project/project_home');
Route::get('/project/project_description/{id}', 'ProjectController@display');
Route::post('/project/project_form', 'ProjectController@create');
Route::get('/project/project_form', function () {
    return view('project.project_form');
});
//Route::get('/project', 'ProjectController@index');

Route::get('/team', 'HomeController@index')->name('home');
Route::get('/contact', 'HomeController@index')->name('home');