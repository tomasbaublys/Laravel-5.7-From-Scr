@extends('layout')

@section('title', 'Projects')

@section('content')

<h1 class="title">Projects</h1>

<ul>
	@foreach ($projects as $project)
		<li class="title is-6">
			<a href="/projects/{{ $project->id }}">
				{{ $project->title }}
			</a>
		</li>
	@endforeach
</ul>

@endsection