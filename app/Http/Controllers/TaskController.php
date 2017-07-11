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
    public function __construct()
	{
		$this->middleware('auth');
	}    

	public function index()
	{
		$tasks = Auth::user()
		->tasks()
		->with('project')
		->with('tags')
		->get();

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
		$task->complete = false;
		$task->save();

		return redirect('/');
	}

	public function update(Task $task, Request $request)
	{
		$task->complete = true;
		$task->save();

		return redirect('/');
	}
}
