<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('project', 'ProjectController', ['only' => ['index', 'create', 'store', 'edit', 'update']]);
Route::resource('group', 'GroupFunctionController', ['only' => ['create', 'store', 'edit', 'update']]);
Route::get('group/project/{project_id}', 'GroupFunctionController@index')->name('group.index');
Route::get('function/list/{project_id}/{group_id}', 'FunctionController@index')->name('function.index');
Route::get('function/create/{project_id}/{group_id}', 'FunctionController@create')->name('function.create');
Route::resource('function', 'FunctionController', ['only' => ['store', 'edit', 'update']]);
