<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::latest()->paginate(20);
        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'content' => 'nullable|string',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'features' => 'nullable|array',
            'price' => 'nullable|numeric|min:0',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        $data['is_published'] = $request->has('is_published');
        $data['features'] = json_encode($request->features ?? []);

        // Handle icon file upload
        if ($request->hasFile('icon')) {
            $uploadedFiles = $this->handleImageUpload($request->file('icon'), 'services');
            $data['icon'] = $uploadedFiles['original'];
        }

        // Handle image file upload
        if ($request->hasFile('image')) {
            $uploadedFiles = $this->handleImageUpload($request->file('image'), 'services');
            $data['image'] = $uploadedFiles['original'];
        }

        Service::create($data);

        return redirect()->route('admin.services.index')
            ->with('success', 'Service created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        return view('admin.services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'content' => 'nullable|string',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'features' => 'nullable|array',
            'price' => 'nullable|numeric|min:0',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        $data['is_published'] = $request->has('is_published');
        $data['features'] = json_encode($request->features ?? []);

        // Handle icon file upload
        if ($request->hasFile('icon')) {
            // Delete old icon if exists
            if ($service->icon) {
                $this->deleteImages($service->icon, 'services');
            }

            $uploadedFiles = $this->handleImageUpload($request->file('icon'), 'services');
            $data['icon'] = $uploadedFiles['original'];
        } else {
            // Keep existing icon if no new file uploaded
            unset($data['icon']);
        }

        // Handle image file upload
        if ($request->hasFile('image')) {
            // Delete old images if exists
            if ($service->image) {
                $this->deleteImages($service->image, 'services');
            }

            $uploadedFiles = $this->handleImageUpload($request->file('image'), 'services');
            $data['image'] = $uploadedFiles['original'];
        } else {
            // Keep existing image if no new file uploaded
            unset($data['image']);
        }

        $service->update($data);

        return redirect()->route('admin.services.index')
            ->with('success', 'Service updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('admin.services.index')
            ->with('success', 'Service deleted successfully.');
    }
}
