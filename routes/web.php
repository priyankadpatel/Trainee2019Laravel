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
Route::post('/createblog','BlogController@insert');

Route::get('/viewblog','BlogController@view');

Route::get('/blogedit/{id}','BlogController@edit');

Route::get('/Category-blog/{Categoryname}','BlogController@Categoryblog');

Route::post('/blogedit/{id}','BlogController@blogedit');

Route::post('/comment','BlogController@comment');

Route::get('/blogdelete/{id}','BlogController@blogdelete');
 
Route::get('/blogdetails/{id}','BlogController@details');

Route::post('/search','BlogController@find');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/about', 'HomeController@index')->name('home');

Route::get('/blog', 'HomeController@create')->name('blog/create');

Route::get('contact-us', 'ContactController@contactUS');

Route::post('contact-us', 'ContactController@contactSaveData');




Route::get('/project', 'ProjectController@index')->name('project/project_home');

Route::get('/team', 'HomeController@index')->name('home');

Route::get('/contact', 'HomeController@index')->name('home');