@extends('layout')

@section('title', 'Create a project')

@section('content')


<p class="title">Create a New Project</p>
<form action="/projects" method="POST">
	{{ csrf_field() }}
	<div class="field">
		<label class="label" for="title">Project Title</label>

		<div class="control">
			<input type="text" class="input {{ $errors->has('title') ? 'is-danger' : '' }}" name="title" value="{{ old('title') }}">
		</div>
	</div>

	<div class="field">
		<label class="label" for="description">Description</label>

		<div class="control">
			<textarea name="description" class="textarea {{ $errors->has('description') ? 'is-danger' : '' }}">{{ old('description') }}</textarea>
		</div>
	</div>	
	
	<div class="field">
		<div class="control">
			<button type="submit" class="button is-link">Create Project</button>
		</div>
	</div>
	
	@include ('errors')
</form>


@endsection
