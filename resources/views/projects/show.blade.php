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
		<div>
			@foreach ($project->tasks as $task)
				<div>
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



@endsection