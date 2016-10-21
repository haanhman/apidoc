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
Route::resource('group', 'GroupFunctionController', ['only' => ['store', 'edit', 'update']]);
Route::get('group/create/{project_id}', 'GroupFunctionController@create')->name('group.create');


Route::get('group/project/{project_id}', 'GroupFunctionController@index')->name('group.index');
Route::get('function/list/{project_id}/{group_id}', 'FunctionController@index')->name('function.index');
Route::get('function/create/{project_id}/{group_id}', 'FunctionController@create')->name('function.create');
Route::resource('function', 'FunctionController', ['only' => ['store', 'edit', 'update']]);


Route::get('document/{project_id}', 'DocumentController@index')->name('document.index');
Route::get('function/{function_id}/delete', 'FunctionController@delete')->name('function.delete');