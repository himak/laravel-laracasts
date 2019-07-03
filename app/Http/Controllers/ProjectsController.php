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
}
