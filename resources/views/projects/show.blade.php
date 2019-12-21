@extends('layout')

@section('content')

	<h1 class="title">{{ $project->title }}</h1>

	<div class="content">

        {{ $project->description }}

        <p>
            <a href="/projects/{{ $project->id }}/edit">Edit</a>
        </p>

        @if($project->tasks->count())
            <ul>
                @foreach( $project->tasks as $task )
                    <li>{{ $task->description }}</li>
                @endforeach
            </ul>
        @endif

    </div>

@endsection
