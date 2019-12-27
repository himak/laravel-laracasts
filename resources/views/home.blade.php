@extends('layout')

@section('content')

    <section class="hero is-medium is-light is-bold">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    Home
                </h1>
                <h2 class="subtitle">
                    Welcome
                </h2>
            </div>
        </div>
    </section>

    <br>

    <div class="container">
        <div class="columns">
            <div class="column is-half is-offset-3 content">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor, doloribus ex in iste iure mollitia nemo nobis officia perspiciatis placeat porro quisquam, ratione reiciendis sapiente sunt, suscipit totam veniam voluptate. </p>

                @if($tasks)
                    <p>Tasks:</p>
                    <ul>
                        @foreach($tasks as $task)
                            <li>{{ $task }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>

@endsection
