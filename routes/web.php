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


Route::post('/createblog','BlogController@insert');

Route::get('/viewblog','BlogController@view');

Route::get('/blogedit/{id}','BlogController@edit');

Route::get('/Category-blog/{Categoryname}','BlogController@Categoryblog');

Route::post('/blogedit/{id}','BlogController@blogedit');

Route::post('/comment','BlogController@comment');

Route::get('/blogdelete/{id}','BlogController@blogdelete');
 
Route::get('/blogdetails/{id}','BlogController@details');

Route::post('/search','BlogController@find');

Route::get('/blog', 'BlogController@index')->name('blog/create');



Route::get('contact-us', 'ContactController@contactUS');

Route::post('contact-us', 'ContactController@contactSaveData');

Route::get('/project_home', 'ProjectController@index')->name('project/project_home');

Route::get('/project_home/{Categoryname}', 'ProjectController@searchprojectcategory');

Route::get('/project/project_description/{id}', 'ProjectController@display');

Route::group(['middleware' => ['auth']], function () {
    
    // Route::get('/user', 'ProjectController@index')->name('user');


    Route::group(['middleware' => ['admin']], function () {

        // Route::get('/admin', 'ProjectController@admindemo')->name('admin');
        Route::get('/project/project_edit','ProjectController@ProjectCategory');
      
        Route::post('/project/project_edit', 'ProjectController@create');

        Route::get('/project/edit/{id}', 'ProjectController@edit');
        Route::post('/project/project_description/{id}', 'ProjectController@projectedit');

        Route::get('/projectdelete/{id}','ProjectController@projectdelete');

    });

});



Route::get('/home', 'HomeController@index')->name('home');

Route::get('/about', 'HomeController@index')->name('home');

Route::get('/team', 'HomeController@index')->name('home');

Route::get('/contact', 'HomeController@index')->name('home');


