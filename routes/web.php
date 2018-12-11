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
Route::get('/projects/all', 'ProjectController@all');
Route::post('/projects', 'ProjectController@store');
Route::get('/projects/create', 'ProjectController@create');
Route::get('/projects/{project}', 'ProjectController@show');
Route::get('/projects/edit/{project}', 'ProjectController@edit');
Route::patch('/projects/{project}', 'ProjectController@update');
Route::delete('/projects/{project}', 'ProjectController@destroy');

Route::post('/projects/{project}/add-task', 'ProjectTaskController@add');
Route::post('/projects/{project}/tasks', 'ProjectTaskController@store');
Route::get('/projects/{project}/tasks/edit/{task}', 'ProjectTaskController@edit');
Route::patch('/projects/{project}/tasks/edit/{task}', 'ProjectTaskController@update');
Route::delete('/projects/{project}/tasks/delete/{task}', 'ProjectTaskController@destroy');


Route::get('/teams', 'TeamController@index');
Route::get('/teams/all', 'TeamController@all');
Route::post('/teams', 'TeamController@store');
Route::get('/teams/create', 'TeamController@create');
Route::get('/teams/{team}', 'TeamController@show');
Route::get('/teams/edit/{team}', 'TeamController@edit');
Route::patch('/teams/{team}', 'TeamController@update');
Route::delete('/teams/{team}', 'TeamController@destroy');

Route::post('/teams/{team}/user/assign', 'TeamUserController@assign');
Route::post('/teams/{team}/user', 'TeamUserController@store');
Route::delete('/teams/{team}/user/{user}', 'TeamUserController@remove');



Route::post('/projects/{project}/tasks', 'ProjectTaskController@store');
Route::get('/projects/{project}/tasks/edit/{task}', 'ProjectTaskController@edit');
Route::patch('/projects/{project}/tasks/edit/{task}', 'ProjectTaskController@update');
Route::delete('/projects/{project}/tasks/delete/{task}', 'ProjectTaskController@destroy');

Route::post('/completed-tasks/{task}','CompletedTasksController@store');
Route::delete('/completed-tasks/{task}','CompletedTasksController@destroy');

Route::post('/completed-projects/{project}','CompletedProjectsController@store');
Route::delete('/completed-projects/{project}','CompletedProjectsController@destroy');