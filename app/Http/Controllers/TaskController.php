<?php

namespace App\Http\Controllers;
use App\Project;
use App\Task;
use App\User;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class TaskController extends Controller
{
    
public function index()
  {
    $tasks = Task::where('user_id',Auth::user()->id)->get();
    $projects = Project::where('id',3)->get();
    
    return view('tasks.tasks', ['tasks' => $tasks, 'projects'=>$projects]);
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
  $task->complete = false;
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
