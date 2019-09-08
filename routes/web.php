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
/*
    GET -> index
    GET (form) -> create
    GET (singular) -> show
    POST -> store
    GET (form) -> edit
    PATCH (singular) -> update
    DELETE (singular) -> destroy
*/
Route::resource('projects', 'ProjectsController');  //this is same as below

/*
Route::get('/projects', 'ProjectsController@index'); //get
Route::get('/projects/{project}', 'ProjectsController@show'); //dynamic

Route::get('/projects/create', 'ProjectsController@create'); //create form
Route::post('/projects', 'ProjectsController@store'); //store, insert into DB

Route::get('/projects/{project}/edit', 'ProjectsController@edit'); //update form
Route::patch('/projects/{project}', 'ProjectsController@update'); //update, update into DB

Route::delete('/projects/{project}', 'ProjectsController@destroy'); //delete
*/
Route::post('/projects/{project}/tasks', 'ProjectTasksController@store');
Route::patch('/tasks/{task}', 'ProjectTasksController@update');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
