@extends('layout')

@section('title', 'Show project')

@section('content')

	<h1 class="title">{{ $project->title }}</h1>

	<div class="content">
		{{ $project->description }}

		<p>
			<a href="/projects/{{ $project->id }}/edit">Edit</a>
		</p>

	</div>

	@if ($project->tasks->count())
		<div class="box">
			@foreach ($project->tasks as $task)
				<div class="content">
					<form action="/tasks/{{ $task->id }}" method="POST">
						@method("PATCH")
						@csrf
						<label class="checkbox {{ $task->completed ? 'is-compelte' : '' }}" for="completed">
							<input type="checkbox" name="completed" onChange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>
							{{ $task->description }}
						</label>
					</form>
				</div>
			@endforeach
		</div>
	@endif
	
	<form class="box" action="/projects/{{ $project->id }}/tasks" method="POST">
		@csrf
		<div class="field">
			<label class="label" for="description">New Task</label>

			<div class="control">
				<input type="text" class="input" name="description" placeholder="New Task">
			</div>
		</div>
		<div class="field">
			<div class="control">
				<button type="submit" class="button is-link">Add Task</button>
			</div>
		</div>

		@include ('errors')
	</form>




@endsection