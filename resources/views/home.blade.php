@extends('layout')

@section('content')
	<h1>My {{ $foo }} Website!</h1>
	{{-- None escape variable javascript --}}
	<h1>My {!! $foo !!} Website!</h1>

	@foreach($tasks as $task)
		<li>{{ $task }}</li>
	@endforeach
@endsection