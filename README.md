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