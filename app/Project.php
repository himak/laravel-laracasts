<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    // I accept only this value
    protected $fillable = [
    	'title', 'description'
    ];
}
