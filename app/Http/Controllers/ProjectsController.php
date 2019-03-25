<?php

namespace App\Http\Controllers;
use App\Project;
use App\Task;
use App\Mail\ProjectCreated;

use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$projects = Project::where('owner_id', auth()->id())->get();

    	return view('projects.index', compact('projects'));
    }

    public function create()
    {

    	return view('projects.create');
    }

    public function show(Project $project)
    {
        $this->authorize('update', $project);

    	return view('projects.show', compact('project'));
    }

    public function store()
    {
        /* 1.) cleanest code plus validation, best of these 3 options */
        $attributes = request()->validate([
                    'title' => ['required', 'min:3'],
                    'description' => ['required', 'min:3'],
                ]);

        $attributes['owner_id'] = auth()->id();

        $project = Project::create($attributes);

        \Mail::to('tomas.forumfilms@gmail.com')->send(
            new ProjectCreated($project)
        );

        /* 2.) Shorter variant 
        Project::create([
            'title' => request('title'),
            'description' => request('description')
        ]);
        */

        /* 3.) Long varaiant 
    	$project = new Project();
    	$project->title = request('title');
    	$project->description = request('description');
    	$project->save();
        */

    	return redirect('/projects');
    }

    public function edit(Project $project)
    { 
	    return view('projects.edit', compact('project'));
    }

    public function update(Project $project)
    {
        $this->authorize('update', $project);

        /* 1.) cleanest code, best of these 3 options */
        $project->update(request(['title', 'description']));

         /* 3.) Long varaiant 
    	$project->title = request('title');
    	$project->description = request('description');
    	$project->save();
        */

    	return redirect('/projects');
    }

    public function destroy(Project $project)
    {
        $this->authorize('update', $project);

    	$project->delete();
    	return redirect('/projects');
    }
}
