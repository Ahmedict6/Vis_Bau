<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->paginate(20);
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'content' => 'nullable|string',
            'featured_image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'gallery' => 'nullable|array',
            'client' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'completion_date' => 'nullable|date',
            'project_type' => 'nullable|string|max:255',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        $data['is_published'] = $request->has('is_published');
        $data['is_featured'] = $request->has('is_featured');
        $data['gallery'] = json_encode($request->gallery ?? []);

        // Handle file upload
        if ($request->hasFile('featured_image')) {
            $uploadedFiles = $this->handleImageUpload($request->file('featured_image'), 'projects');
            $data['featured_image'] = $uploadedFiles['original'];
        }

        // Handle gallery images if provided
        if ($request->hasFile('gallery_images')) {
            $galleryImages = $this->handleMultipleImageUploads($request->file('gallery_images'), 'projects');
            $data['gallery'] = json_encode($galleryImages);
        }

        Project::create($data);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project created successfully.');
    }

    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'content' => 'nullable|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'gallery' => 'nullable|array',
            'client' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'completion_date' => 'nullable|date',
            'project_type' => 'nullable|string|max:255',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        $data['is_published'] = $request->has('is_published');
        $data['is_featured'] = $request->has('is_featured');
        $data['gallery'] = json_encode($request->gallery ?? []);

        // Handle file upload
        if ($request->hasFile('featured_image')) {
            // Delete old image if exists
            if ($project->featured_image) {
                $this->deleteImages($project->featured_image, 'projects');
            }

            $uploadedFiles = $this->handleImageUpload($request->file('featured_image'), 'projects');
            $data['featured_image'] = $uploadedFiles['original'];
        } else {
            // Keep existing image if no new file uploaded
            unset($data['featured_image']);
        }

        // Handle gallery images if provided
        if ($request->hasFile('gallery_images')) {
            // Delete existing gallery images
            if ($project->gallery) {
                $existingGallery = json_decode($project->gallery, true);
                if ($existingGallery) {
                    $this->deleteImages($existingGallery, 'projects');
                }
            }

            $galleryImages = $this->handleMultipleImageUploads($request->file('gallery_images'), 'projects');
            $data['gallery'] = json_encode($galleryImages);
        }

        $project->update($data);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project deleted successfully.');
    }
}
