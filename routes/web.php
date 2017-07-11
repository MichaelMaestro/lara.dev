<?php

use App\Task;
use Illuminate\Http\Request;

/**
 * Show Task Dashboard
 */

Route::get('', 'TaskController@index');

Route::get('task/create', 'TaskController@create');

Route::post('/task', 'TaskController@store');

Route::delete('/task/{task}', 'TaskController@destroy');

Route::patch('/task/{task}', 'TaskController@update');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/tag/{id}/tasks', 'TagController@index');
