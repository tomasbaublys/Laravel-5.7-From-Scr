@extends('layout')

@section('title', 'Create a project')

@section('content')

<h1>Create a New Project</h1>

<form action="/projects" method="POST">
	{{ csrf_field() }}
	<div>
		<input type="text" name="title" placeholder="Project title">
	</div>
	<div>
		<textarea name="description" placeholder="Project description"></textarea>
	</div>
	<div>
		<button type="submit">Create Project</button>
	</div>
	
</form>

@endsection