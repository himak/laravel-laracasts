# Laracasts

## Laravel 5.7 From Scratch 2018

### Episode 1, 2, 3, 4 - The Laravel Shell, Initial Setup Requirements, Basic Routing, Blade Layout Files

Create routes for pages: home, about and contact.
Create layout.blade.php file for header and footer.

### Episode 5 - Sending Data to Your View

Create some examples.

### Episode 6 - Controller 101

Create pages controller:

	php artisan make:controller PagesController

### Episode 7 - Databases and Migration

Please config connect to DB in .env file.

Run default migrate:

	php artisan migrate

Create new migration:

	php artisan make:migration create_projects_table

Run projets migrations:

	php artisan migrate

### Episode 8 - Eloquent, Namespacing, and MVC

Create model Project

	php artisan make:model Project

Run tinker:

	php artisan tinker

#### Tinker commands

View all projects from Projects:

	>>> App\Project:all();

Create a new project for Projects:

	>>> $project = new App\Project;
	>>> $project->title = 'My First Project';
	>>> $project->description = 'Lorem ipusum';

View data of new project:

	>>> $project

Save project:

	>>> $project->save();

Create and save another project:

	>>> $project = new App\Project;
	>>> $project->title = 'My Second Project';
	>>> $project->description = 'Lorem ipusum';
	>>> $project->save();

View project:

	>>> App\Project::all()[1];

View title of project:

	>>> App\Project::all()[1]->title;

View titles of all projects:

	>>> App\Project::all()->map->title;

Create Projects Controller

	php artisan make:controller ProjectsController

Send data to view:

- output as JSON

		// ProjectsController.php
		public function index()
		{
			$projects = \App\Project::all();
			return $projects;
		}

- output prepare to HTML

		// ProjectsController.php
		public function index()
		{
			$projects = \App\Project::all();
			return view('projects.index', compact('projects'));
		}

		// projects/index.blade.php
		@foreach($projects as $project)
			<li>{{ $project->title }}</li>
		@endforeach

### Episode 9 - Directory Structure Review

Create fake user from tinker:

	php artisan tinker
	>>> factory(App\User::class)->make();

Create fake user and save to DB from tinker:

	>>> factory(App\User::class)->create();

In file **app/Http/Kernel.php** is all middleware which run during every single request.

In folder **app/Providers** you can find or add next service provider to hooked any component of Laravel.

### Episode 10 - Form Handling and CSRF Protection

##### CSRF Protection

Do not remember add hidden input with token to form:

	<form method="POST" action="/projects">
		// Blade directive for generate input
		@csrf

		// only token value
		{{ csrf_token() }}

Create and save a new project:

	// ProjectsController.php
	public function store()
	{
	    $project = new \App\Project();

	    $project->title = request('title');
	    $project->description = request('description');

	    $project->save();

	    return redirect('/projects');
	}

Access to value in request:

	return request()->all(); // output is JSON
	return request('title'); // output is TEXT

### Episode 11 - Routing Conventions Worth Following

GET	/projects (index) // view all projects
GET	/projects/create (create) // view FORM for create project
GET /projects/1 (show) // view detail project
POST /projects (store) // save a new project
GET /projects/1/edit (edit) // view FORM for edit project
PATCH /projects/1 (update)
DELETE /projects/1 (destroy)

	Route::get('/projects', 'ProjectsController@index');
	Route::get('/projects/create', 'ProjectsController@create');
	Route::get('/projects/{project}', 'ProjectsController@show');
	Route::post('/projects', 'ProjectsController@store');
	Route::get('/projects/{project}/edit', 'ProjectsController@edit');
	Route::patch('/projects/{project}', 'ProjectsController@update');
	Route::delete('/projects/{project}', 'ProjectsController@destroy');

	// or shorter notation and autogenerate routes
	Route::resource('projects', 'ProjectsController');


Get all route list:

	php artisan route:list

Create Posts controller with routes resource:

	php artisan make:controller PostsController -r

Create Posts controller with model and routes resource:

	php artisan make:controller PostsController -r -m Post

### Episode 12 - Faking PATCH and DELETE Requests

Edit controller function (ProjectsController.php):

	// URL is example.com/projects/1/edit
	public function edit($id)
	{
	    $project = \App\Project::findOrFail($id);	// only exist project in DB
	    // return $project;    // output as JSON

	    return view('projects.edit', compact('project'));
	}

Edit HTML form (edit.blade.php):

	<form method="POST" action="/projects/{{ $project->id }}">
		/*
		 	You must add, because app have only PATH route
			Route::patch('/projects/{project}', 'ProjectsController@update');
		*/
		{{ method_field('PATCH') }}

		@csrf

	    <input class="input" type="text" name="title" value="{{ $project->title }}">

	    <textarea class="textarea" name="description">{{ $project->description }}</textarea>

	  <button type="submit">Update Project</button>
	</form>

Update controller function (ProjectsController.php):

	public function update($id)
	{
	    // dd(request()->all());

	    $project = \App\Project::findOrFail($id);

	    $project->title = request('title');
	    $project->description = request('description');

	    $project->save();

	    return redirect('/projects');
	}

### Episode 13 - Form Delete Requests

Change **find** to **findOrFail** in function edit, update, destroy

	$project = \App\Project::findOrFail($id);	// edit
	$project = \App\Project::findOrFail($id); // update
	\App\Project::findOrFail($id)->delete();	// delete

Create DELETE button (edit.blade.php):

	<form method="POST" action="/projects/{{ $project->id }}">
		@method('DELETE')
		@csrf

		<div class="control">
		  <button class="button">Delete Project</button>
		</div>
	</form>

Updated controller destroy function (ProjectsController.php):

	public function destroy($id)
	{
	    \App\Project::findOrFail($id)->delete();

	    return redirect('/projects');
	}

### Episode 14 - Cleaner Controllers and Mass Assignment Concerns

Create SHOW function in controller:

	public function show($id)
	{
	    $project = Project::findOrFail($id);

	    // return $project;    // output as JSON
	    return view('projects.show', compact('project'));
	}

	OR next with wildcard

	public function show(Project $project)
	{
	    // return $project;    // output as JSON
	    return view('projects.show', compact('project'));
	}

Create detail project page with edit link (show.blade.php):

	<h1 class="title">{{ $project->title }}</h1>

	<div class="content">{{ $project->description }}</div>

	<p>
		<a href="/projects/{{ $project->id }}/edit">Edit Project</a>
	</p>

Add namespace Project in top of controller file:

	use App\Project;

for short code:

	$projects = \App\Project::all();	// before
	$projects = Project::all();		// after

Change parameter in functions ProjectController:

	public function destroy($id) // before
	public function destroy(Project $project) // after

	// e.g. for DELETE
	Project::findOrFail($id)->delete();
	$project->delete();

Change syntax code in store():

BEFORE

	$project = new Project();

	$project->title = request('title');
	$project->description = request('description');

	$project->save();

NEW CODE for CREATE

	// before, but not safe
	Project::create(request()->all());

	// better, but not clean code
	Project::create([
	     'title' => request('title'),
	     'description' => request('description')
	]);

	// best clean and safe code
	Project::create( request( ['title', 'description'] ) );

NEW CODE for UPDATE

	// before
	$project->title = request('title');
	$project->description = request('description');
	$project->save();

	// after
	Project::update( request( ['title', 'description'] ) );


For NEW CODE you must add this code in model Project:

    // I accept only this value
    protected $fillable = [
    	'title',
    	'description'
    ];

	// I accept EXCEPT this value
    protected $guarded = [
     	'title', 'description'
    ];

	// I accept all values
    protected $guarded = [];

Request data:

	dd(
		request(
			'title',
			'description'
		)
	);

	// in browser output as raw text only title:
	This is a title project

	dd(
		request(
			[
				'title',
				'description'
			]
		)
	);

	// in browser output as ARRAY with key

	array:2 [▼
	  "title" => "This is a title project"
	  "description" => "Some text"
	]

	// If
	dd(request()->all());

	// in browser
	array:3 [▼
	  "_token" => "Mb9W9ywrzArrk2qLGpH0lvwiTGat2XxBeLoKLOD5"
	  "id" => "1000"
	  "title" => "Title"
	  "description" => "Text"
	]



