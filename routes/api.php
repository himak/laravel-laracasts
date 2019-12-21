<?php

use App\Project;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('projects', function() {
    return Project::all();
});

Route::get('projects/{id}', function($id) {
    return Project::find($id);
});

Route::post('projects', function(Request $request) {
    return Project::create($request->all);
});

Route::put('projects/{id}', function(Request $request, $id) {
    $project = Project::findOrFail($id);
    $project->update($request->all());

    return $project;
});

Route::delete('projects/{id}', function($id) {
    Project::find($id)->delete();

    return 204;
});
