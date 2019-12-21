@extends('layout')

@section('content')

    <br>

    <div class="tile is-ancestor">
        <div class="tile is-6 is-vertical is-parent">
            @foreach($projects as $project)
                <div class="tile is-child box">
                        <p class="title"><a href="/projects/{{ $project->id }}">{{ $project->title }}</a></p>
                        <p>{{ $project->description }}</p>
                </div>
            @endforeach
        </div>
    </div>

	<p style="margin-top: 20px;">
		<a href="/projects/create" class="button is-primary">Create Project</a>
	</p>

@endsection
