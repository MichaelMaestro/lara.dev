<?php

namespace App\Http\Controllers;

use App\Project;
use App\Task;
use App\User;
use App\Tag;
use App\Mail\TaskCreated;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;

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
		->paginate(7);

		return view('tasks.tasks', ['tasks' => $tasks]);
	}

	public function destroy(Task $task)
	{
		$task->delete();
		return redirect('/');
	}

	public function create()
	{
		$projects = Project::all();
		$tags = Tag::all();

		return view('tasks.create', compact('projects', 'tags'));
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

		$user = Auth::user()->email;

		$task = new Task;
		$task->name = $request->name;
		$task->user_id = Auth::user()->id;
		$task->project_id = $request->project_id;
		$task->complete = false;
		$task->save();

		$task->tags()->sync($request->tag_ids);

		\Mail::to($user)->send(new TaskCreated($task));
		return redirect('/');
	}

	public function update(Task $task, Request $request)
	{
		$task->complete = true;
		$task->save();

		return redirect('/');
	}
}
