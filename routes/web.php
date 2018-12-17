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


Route::prefix('/users')->group(function () {
    Route::get('', 'UsersController@index');
    Route::post('', 'UsersController@store');
    Route::get('/add', 'UsersController@add');
    Route::get('/{user}', 'UsersController@show');
    Route::get('/edit/{user}', 'UsersController@edit');
    Route::patch('/{user}', 'UsersController@update');
    Route::delete('/{user}', 'UsersController@destroy');
});



Route::prefix('/projects')->group(function () {
    Route::get('', 'ProjectController@index');
    Route::get('/all', 'ProjectController@all');
    Route::post('', 'ProjectController@store');
    Route::get('/create', 'ProjectController@create');
    Route::get('/{project}', 'ProjectController@show')->name('projects.show');
    Route::get('/edit/{project}', 'ProjectController@edit');
    Route::patch('/{project}', 'ProjectController@update');
    Route::delete('/{project}', 'ProjectController@destroy');

    Route::post('/{project}/add-task', 'ProjectTaskController@add');
    Route::post('/{project}/tasks', 'ProjectTaskController@store');
    Route::get('/{project}/tasks/edit/{task}', 'ProjectTaskController@edit');
    Route::patch('/{project}/tasks/edit/{task}', 'ProjectTaskController@update');
    Route::delete('/{project}/tasks/delete/{task}', 'ProjectTaskController@destroy');
});


Route::prefix('/teams')->group(function () {
    Route::get('', 'TeamController@index');
    Route::get('/all', 'TeamController@all');
    Route::post('', 'TeamController@store');
    Route::get('/create', 'TeamController@create');
    Route::get('/{team}', 'TeamController@show');
    Route::get('/edit/{team}', 'TeamController@edit');
    Route::patch('/{team}', 'TeamController@update');
    Route::delete('/{team}', 'TeamController@destroy');

    Route::post('/{team}/user/{user}', 'TeamUserController@leader');
    Route::post('/{team}/user/assign', 'TeamUserController@assign');
    Route::post('/{team}/user', 'TeamUserController@store');
    Route::delete('/{team}/user/{user}', 'TeamUserController@remove');
});



Route::post('/completed-tasks/{task}','CompletedTasksController@store');
Route::delete('/completed-tasks/{task}','CompletedTasksController@destroy');

Route::post('/completed-projects/{project}','CompletedProjectsController@store');
Route::delete('/completed-projects/{project}','CompletedProjectsController@destroy');