<?php

namespace App\Http\Controllers;

use App\Task;
use App\Http\Controllers\Controller;

class TasksViewController extends Controller
{
  /**
   * Показать профиль данного пользователя.
   * @return Response
   */
  public function show()
  {
    $tasks = Task::orderBy('created_at', 'asc')->get();
    return view('tasks.tasks', ['tasks' => $tasks]);
  }
}