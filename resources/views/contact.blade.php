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

    <section class="hero is-medium is-light is-bold">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    Contact
                </h1>
                <h2 class="subtitle">
                    Send us message
                </h2>
            </div>
        </div>
    </section>

    <br>

    <div class="container">
        <div class="columns">
            <div class="column is-half is-offset-3">

                <div class="field">
                    <label class="label">Name</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input" type="text" placeholder="name">
                        <span class="icon is-small is-left">
                            <i class="fas fa-user"></i>
                        </span>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Email</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input is-danger" type="email" placeholder="Email input" value="hello@">
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <span class="icon is-small is-right">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                    </div>
                    <p class="help is-danger">This email is invalid</p>
                </div>

                <div class="field">
                    <label class="label">Message</label>
                    <div class="control">
                        <textarea class="textarea" placeholder="Textarea"></textarea>
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                        <label class="checkbox">
                            <input type="checkbox">
                            I agree to the <a href="#">terms and conditions</a>
                        </label>
                    </div>
                </div>

                <button class="button is-primary">Send</button>

            </div>
        </div>
    </div>

@endsection
