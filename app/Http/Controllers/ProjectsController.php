<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
    {
    	$projects = Project::all();

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


    public function show(Project $project)
    // public function show($id)
    {
        // $project = Project::findOrFail($id);

        // return $project;    // output as JSON
        return view('projects.show', compact('project'));
    }


    public function store()
    {
        // dd(request(['title', 'description']));
        // dd(request()->all());

        // return request()->all(); // output is JSON
        // return request('title'); // output is TEXT

        // $project = new Project();

        // $project->title = request('title');
        // $project->description = request('description');

        // $project->save();

        // OR 1, not safe
        // Project::create(request()->all());

        // OR 2, better
        // Project::create([
        //     'title' => request('title'),
        //     'description' => request('description')
        // ]);

        // OR 3, best
        Project::create( request( ['title', 'description'] ) );

        return redirect('/projects');
    }


    public function edit(Project $project)  // example.com/projects/1/edit
    {
        // return $project;    // output as JSON
        return view('projects.edit', compact('project'));
    }


    public function update(Project $project)
    {
        // dd(request()->all());
        // if with ID in update($id)
        //$project = Project::findOrFail($id);

        // $project->title = request('title');
        // $project->description = request('description');

        // $project->save();

        Project::update( request( ['title', 'description'] ) );

        return redirect('/projects');
    }


    public function destroy(Project $project)
    {
        $project->delete();

        return redirect('/projects');
    }
}
