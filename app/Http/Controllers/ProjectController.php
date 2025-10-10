<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\SectionSetting;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        // Check if Projects section is active
        if (!SectionSetting::isSectionActive('projects')) {
            abort(404, 'Projects section is currently unavailable.');
        }

        $projects = Project::where('is_published', true)
            ->orderBy('sort_order')
            ->paginate(12);

        return view('projects.index', compact('projects'));
    }

    public function show(Project $project)
    {
        // Check if Projects section is active
        if (!SectionSetting::isSectionActive('projects')) {
            abort(404, 'Projects section is currently unavailable.');
        }

        if (!$project->is_published) {
            abort(404);
        }

        $relatedProjects = Project::where('is_published', true)
            ->where('id', '!=', $project->id)
            ->where('project_type', $project->project_type)
            ->take(3)
            ->get();

        return view('projects.show', compact('project', 'relatedProjects'));
    }
}
