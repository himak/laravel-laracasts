<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	$tasks = [
		'Go to the store',
		'Go to the market',
		'Go to work',
		'Go to the concert'
	];

	// OR
	// return view('home')
	// 	->withTasks($tasks)
	// 	->withFoo('foobar');

	// OR
	// return view('home')
	// 	->withTasks([
	// 		'Go to the store',
	// 		'Go to the market',
	// 		'Go to work',
	// 		'Go to the concert'
	// 	])
	// 	->withFoo('foobar');

	// OR
	return view('home')->with([
		'tasks' => [
			'Go to the store',
			'Go to the market',
			'Go to work',
			'Go to the concert'
		],
		'foo' => 'foobar'
	]);

	// OR
    return view('home', [
    	'tasks' => $tasks,
    	//'foo' => request('title')		// http://localhost:8000/?title=Laracasts
    	'foo' => '<script>alert("foobar")</script>'		// javascript
    	// 'foo' => 'Foobar'
    ]);
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});
