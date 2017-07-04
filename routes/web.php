<?php

use App\Task;
use Illuminate\Http\Request;

/**
 * Show Task Dashboard
 */

Route::get('', 'TasksViewController@show');

Route::get('task/{id}', 'TasksCreateController@createView');

Route::post('/task', 'TasksCreateController@create');

Route::delete('/task/{task}', 'TasksDeleteController@delete');
