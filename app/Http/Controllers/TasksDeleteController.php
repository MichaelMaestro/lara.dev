<?php

namespace App\Http\Controllers;

use App\Task;
use App\Http\Controllers\Controller;

class TasksDeleteController extends Controller
{
  /**
   * Показать профиль данного пользователя.
   * @return Response
   */
  public function delete(Task $task)
  {
    $task->delete();
	return redirect('/');
  }
}