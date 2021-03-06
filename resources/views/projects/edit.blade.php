@extends('layout')

@section('content')

	<h1 class="title">Edit Project</h1>

	<form method="POST" action="/projects/{{ $project->id }}" style="margin-bottom: 20px;">
		@method('PATCH')
		@csrf

		<div class="field">
		  <label class="label" for="title">Title</label>
		  <div class="control">
		    <input class="input {{ $errors->has('title') ? 'is-danger' : '' }}" type="text" name="title" id="title" placeholder="Title" value="{{ $project->title }}">
		  </div>
		</div>

		<div class="field">
		  <div class="control">
		  	<label class="label" for="description">Description</label>
		    <textarea class="textarea {{ $errors->has('description') ? 'is-danger' : '' }}" name="description" id="description" placeholder="Description">{{ $project->description }}</textarea>
		  </div>
		</div>

        <div class="field">
            <div class="control">
              <button type="submit" class="button is-link">Update Project</button>
            </div>
        </div>

        @if( $errors->any() )
            <div class="notification is-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
	</form>

	<form method="POST" action="/projects/{{ $project->id }}">
		@method('DELETE')
		@csrf

		<div class="control">
		  <button class="button">Delete Project</button>
		</div>
	</form>



@endsection
