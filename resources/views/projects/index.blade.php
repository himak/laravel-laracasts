@extends('layout')

@section('content')

	<h1 class="title">Projects</h1>

	<ul>
		@foreach($projects as $project)
			<li>
				<a href="/projects/{{ $project->id }}">{{ $project->title }}</a>
			</li>
		@endforeach
	</ul>

	<p style="margin-top: 20px;">
		<a href="/projects/create" class="button is-primary">Create Project</a>
	</p>

@endsection