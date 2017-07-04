<?php

namespace App\Http\Controllers;

use App\Task;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class TasksCreateController extends Controller
{
  /**
   * Показать профиль данного пользователя.
   * @return Response
   */
  public function createView($id)
  {
    return view('tasks.create');
  }

   public function create(Request $request)
  {
 	$validator = Validator::make($request->all(), [
    'name' => 'required|max:255',
  ]);

  if ($validator->fails()) {
    return redirect('/')
      ->withInput()
      ->withErrors($validator);
  }

  $task = new Task;
  $task->name = $request->name;
  $task->save();

  return redirect('/');
  }

}