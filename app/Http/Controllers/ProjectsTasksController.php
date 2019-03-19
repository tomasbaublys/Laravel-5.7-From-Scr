<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class ProjectsTasksController extends Controller
{
    public function update(Task $task)
    {
    	$task->update([
    		'completed' => request()->has('completed')
    	]);

    	return back();
    }
}
