<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
    {
    	$projects = \App\Project::all();

    	// output as JSON
    	//return $projects;

    	// output to prepare HTML
    	// return view('projects.index', compact('projects'));
    	// OR
    	return view('projects.index')->withProjects($projects);
    }


    public function create()
    {
    	return view('projects.create');
    }


    public function show()
    {

    }


    public function store()
    {
        // return request()->all(); // output is JSON
        // return request('title'); // output is TEXT

        $project = new \App\Project();

        $project->title = request('title');
        $project->description = request('description');

        $project->save();

        return redirect('/projects');
    }


    public function edit()
    {

    }


    public function update()
    {

    }


    public function destroy()
    {

    }
}
