@extends('layout')

@section('content')

	<h1 class="title">{{ $project->title }}</h1>

        {{ $project->description }}

        <p>
            <a href="/projects/{{ $project->id }}/edit">Edit</a>
        </p>

        <br>

        @if($project->tasks->count())
            <div class="box">
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
            </div>
        @endif

        {{-- add a new task form --}}
        <div class="box">
            <form method="POST" action="/projects/{{ $project->id }}/tasks">
                @csrf
                <div class="field">
                    <label for="description" class="label">New Task</label>

                    <div class="control">
                        <input type="text" class="input {{ $errors->has('description') ? 'is-danger' : '' }}" name="description" placeholder="New Task">
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                        <button class="button is-link" type="submit">Add Task</button>
                    </div>
                </div>
            </form>

            <br>

            @include('errors')
        </div>

@endsection
