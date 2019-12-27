<?php

namespace App\Http\Controllers;


use App\Project;
use App\Task;

class ProjectTasksController extends Controller
{
    public function store(Project $project)
    {
        $attributes = request()->validate(['description' => 'required']);

        $project->addTask($attributes);

        return back();
    }

    public function update(Task $task)
    {
        //$task->update([
        //    'completed' =>  request()->has('completed')
        //]);
        //$task->complete(request()->has('completed'));

        //if (request()->has('completed')) {
        //    $task->complete();
        //} else {
        //    $task->incomplete();
        //}
        // or better
        request()->has('completed') ? $task->complete() : $task->incomplete();

        return back();
    }
}
