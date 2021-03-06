@extends('layout')

@section('content')

	<h1 class="title">Create a new Project</h1>

	<form method="POST" action="/projects">
		@csrf

		<div class="field">
			<label class="label" for="title">Title</label>
			<div class="control">
				<input class="input {{ $errors->has('title') ? 'is-danger' : '' }}" type="text" name="title" placeholder="Project title" value="{{ old('title') }}" _required>
			</div>
		</div>

		<div class="field">
			<div class="control">
				<label class="label" for="description">Description</label>
				<textarea class="textarea {{ $errors->has('description') ? 'is-danger' : '' }}" name="description" placeholder="Project description" _required>{{ old('description') }}</textarea>
			</div>
		</div>

		<div class="field">
			<div class="control">
				<button type="submit" class="button is-primary">Create project</button>
			</div>
		</div>

		@include('errors')

	</form>

@endsection
