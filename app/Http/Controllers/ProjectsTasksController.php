<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Project;

class ProjectsTasksController extends Controller
{

    public function store(Project $project)
    {
    	$project->addTask(
    		request()->validate(['description' => 'required'])
    	);

    	return back();
    }

    public function update(Task $task)
    {
    	$task->complete(request()->has('completed'));

    	return back();
    }
}
