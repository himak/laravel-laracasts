@extends('layout')

@section('content')

	<h1 class="title">{{ $project->title }}</h1>

	<div class="content">

        {{ $project->description }}

        <p>
            <a href="/projects/{{ $project->id }}/edit">Edit</a>
        </p>

        @if($project->tasks->count())
            @foreach( $project->tasks as $task )
                <form method="POST" action=/tasks/{{ $task->id }}>
                    @method('PATCH')
                    @csrf

                    <label for="completed" class="checkbox {{ $task->completed ? 'is-complete' : '' }}">
                        <input type="checkbox" name="completed" onchange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>
                        {{ $task->description }}
                    </label>
                </form>
            @endforeach
        @endif

    </div>

@endsection
