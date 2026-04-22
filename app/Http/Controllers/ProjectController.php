<?php

namespace App\Http\Controllers;

use App\Models\Project;

class ProjectController extends Controller
{
    public function show(Project $project)
{
    $relatedProjects = Project::where('id', '!=', $project->id)
        ->latest()
        ->take(3)
        ->get();

    return view('project', compact('project', 'relatedProjects'));
}
}