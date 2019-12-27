<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = [];

    public function complete($completed = true)
    {
        //$this->update(['completed' => $completed]);
        // or cleancode
        $this->update(compact('completed'));
    }

    public function incomplete()
    {
        //$this->update(['completed' => false]);
        // or cleancode
        $this->complete(false);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
