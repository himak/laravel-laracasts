<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    // I accept only this value
    protected $fillable = [
    	'title', 'description'
    ];

    public function tasks()
    {
    	return $this->hasMany(Task::class);
    }

    public function addTask($task)
    {
        $this->tasks()->create($task);
    }
}
