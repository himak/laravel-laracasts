@extends('layout')

@section('title')
	Contact
@endsection

@section('css')
	<style type="text/css" media="screen">
		form {
			display: flex;
			flex-direction: column;
			min-width: 300px;
		}

		label {
			display: flex;
			justify-content: space-between;
			align-items: center;
			margin-bottom: 1em;
			font-size: .6em;
			color: #fff;
		}

		input, textarea, button {
			padding: .5em 1em;
			border: none;
			box-shadow: none;
			border-radius: 4px;
		}

		input, textarea {
			min-width: 60%;
		}

		textarea {
			min-height: 6em;
		}

		button {
			margin: 1.5em auto 0 auto;
			border: 1px solid #fff;
			background-color: #bada55;
			color: #fff;
		}

		button:hover,
		button:focus {
			border: 1px solid #bada55;
			background-color: #fff;
			color: #bada55;
		}
	</style>
@endsection

@section('content')
	<h1>Contact Form</h1>

	<div class="container">
		<form action="#">

			<label>Name<input type="text"></label>

			<label>E-mail<input type="text" value="@"></label>

			<label>Message<textarea></textarea></label>

			<button type="submit">Send</button>
		</form>
	</div>

@endsection