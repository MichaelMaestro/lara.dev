<?php

namespace App\Http\Controllers;


use App\Project;
use App\Task;
use App\User;
use App\Tag;
use App\Mail\TaskCreated;
use App\TaskImage;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\UploadedFile;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Middleware\CustomTrim;


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
		->with('images')
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
		'project_id' => 'required|exists:project,id',
		'tag_ids.*' => 'required|exists:tags,id',
		'task_images.*' => 'required|image',
		]);

		if ($validator->fails()) {
			return redirect('/task/create')
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


		
		foreach ($request->file('task_images') as $image)
		{

            $image->storeAs('public/images', $image->getClientOriginalName());
            $imageName = $image->getClientOriginalName();

			Image::make(storage_path('app/public/images/'.$imageName))
				->fit(150,150)
				->save();

			$images = new TaskImage;
			$images->task_id = $task->id;
			$images->path = 'storage/images/'.$image->getClientOriginalName();
			$images->save();
		}
		
	

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
