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

Route::get('/users', 'UsersController@index');
Route::post('/users', 'UsersController@store');
Route::get('/users/add', 'UsersController@add');
Route::get('/users/{user}', 'UsersController@show');
Route::get('/users/edit/{user}', 'UsersController@edit');
Route::patch('/users/{user}', 'UsersController@update');
Route::delete('/users/{user}', 'UsersController@destroy');

Route::get('/projects', 'ProjectController@index');
Route::post('/projects', 'ProjectController@store');
Route::get('/projects/create', 'ProjectController@create');
Route::get('/projects/{project}', 'ProjectController@show');
Route::get('/projects/edit/{project}', 'ProjectController@edit');
Route::patch('/projects/{project}', 'ProjectController@update');
Route::delete('/projects/{project}', 'ProjectController@destroy');

Route::get('/teams', 'TeamController@index');
Route::post('/teams', 'TeamController@store');
Route::get('/teams/create', 'TeamController@create');
Route::get('/teams/{team}', 'TeamController@show');
Route::get('/teams/edit/{team}', 'TeamController@edit');
Route::patch('/teams/{team}', 'TeamController@update');
Route::delete('/teams/{team}', 'TeamController@destroy');

Route::post('/completed-tasks/{task}','CompletedTasksController@store');
Route::delete('/completed-tasks/{task}','CompletedTasksController@destroy');