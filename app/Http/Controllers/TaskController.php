<?php

namespace App\Http\Controllers;
use App\Task;
use Illuminate\Http\Request;
use Validator;

class TaskController extends Controller
{
    
public function index()
  {
    $tasks = Task::orderBy('created_at', 'asc')->get();
    return view('tasks.tasks', ['tasks' => $tasks]);
}

  public function destroy(Task $task)
  {
    $task->delete();
	return redirect('/');
}

public function create()
  {
    return view('tasks.create');
}

   public function store(Request $request)
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

public function update(Task $task, Request $request)
{
$task->complete=true;
$task->save();

return redirect('/');
}

}
