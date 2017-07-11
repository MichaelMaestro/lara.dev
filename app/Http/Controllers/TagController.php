<?php

namespace App\Http\Controllers;

use App\Project;
use App\Task;
use App\User;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TagController extends Controller
{
	public function index($id)
	{
		$user_id = Auth::user()->get();
		$tasks = Tag::find($id)
		->tasks()
		->with('project')
		->paginate(7);

		return view('tasks.tags', ['tasks' => $tasks]);
	}
}
