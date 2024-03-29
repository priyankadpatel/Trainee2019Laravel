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

Route::get('/blog', 'HomeController@blogcreate')->name('blog/create');



Route::get('contact-us', 'ContactController@contactUS');

Route::post('contact-us', 'ContactController@contactSaveData');



Route::get('/project_home', 'ProjectController@index')->name('project/project_home');

Route::get('/project_home/{Categoryname}', 'ProjectController@searchprojectcategory');

Route::post('/search', 'ProjectController@search');

Route::get('/project/project_description/{id}', 'ProjectController@display');

Route::group(['middleware' => ['auth']], function () {
    

    Route::group(['middleware' => ['admin']], function () {

        Route::get('/project/project_edit','ProjectController@ProjectCategory');
      
        Route::post('/project/project_edit', 'ProjectController@create');

        Route::get('/project/edit/{id}', 'ProjectController@edit');
        Route::post('/project/project_description/{id}', 'ProjectController@projectedit');

        Route::get('/projectdelete/{id}','ProjectController@projectdelete');

    });

});


Route::get('/team', 'TeamController@index')->name('team/team');
Route::get('/team/teammember/{team_id}', 'TeamController@teammember')->name('team/teammember');

Route::group(['middleware' => ['auth']], function () {

    Route::group(['middleware' => ['admin']], function () {  
        
        Route::get('/team/teaminsert', function () {
            return view('/team/teaminsert');
        });
        Route::post('/team/teaminsert', 'TeamController@teaminsert')->name('team/teaminsert');
        
        Route::post('/team/teamedit', 'TeamController@teaminsert')->name('team/teamedit');
        Route::get('/team/teamedit/{team_id}', 'TeamController@teammember')->name('team/teamedit');
        
        Route::get('/team/teamremove/{team_id}', 'TeamController@teamremove')->name('team/teamremove');
    });


});



Route::get('/', 'Controller@index')->name('home.content');
Route::get('/home', 'HomeController@index');


Route::get('/about', 'HomeController@index')->name('home');


Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
});

//  News Routes are star from here !

Route::get('/news', 'newsController@index');
Route::post('news/create', 'newsController@store')->name('news/create');
Route::get('news/view', 'newsController@show')->name('news/view');
Route::get('news/details/{id}', 'newsController@details')->name('news/details');
Route::get('news/edit/{id}', 'newsController@edit')->name('news/edit');
Route::post('news/edit_process/{id}', 'newsController@update')->name('news/edit_process');
Route::get('news/delete/{id}', 'newsController@newsdelete')->name('news/delete');
Route::get('/Category-news/{Categoryname}','newsController@CategoryNews');
Route::post('/search','newsController@find');
    