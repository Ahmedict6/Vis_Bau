<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSlider;
use Illuminate\Http\Request;

class HeroSliderController extends Controller
{
    public function index()
    {
        $heroSliders = HeroSlider::orderBy('sort_order')->paginate(20);
        return view('admin.hero-sliders.index', compact('heroSliders'));
    }

    public function create()
    {
        return view('admin.hero-sliders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'required|string',
            'button_text' => 'required|string|max:255',
            'button_url' => 'nullable|string|max:255',
            'background_image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        // Handle file upload
        if ($request->hasFile('background_image')) {
            $uploadedFiles = $this->handleImageUpload($request->file('background_image'), 'slider');
            $data['background_image'] = $uploadedFiles['original'];
        }

        HeroSlider::create($data);

        return redirect()->route('admin.hero-sliders.index')
            ->with('success', 'Hero slider created successfully.');
    }

    public function show(HeroSlider $heroSlider)
    {
        return view('admin.hero-sliders.show', compact('heroSlider'));
    }

    public function edit(HeroSlider $heroSlider)
    {
        return view('admin.hero-sliders.edit', compact('heroSlider'));
    }

    public function update(Request $request, HeroSlider $heroSlider)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'required|string',
            'button_text' => 'required|string|max:255',
            'button_url' => 'nullable|string|max:255',
            'background_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        // Handle file upload
        if ($request->hasFile('background_image')) {
            // Delete old image if exists
            if ($heroSlider->background_image) {
                $this->deleteImages($heroSlider->background_image, 'slider');
            }

            $uploadedFiles = $this->handleImageUpload($request->file('background_image'), 'slider');
            $data['background_image'] = $uploadedFiles['original'];
        } else {
            // Keep existing image if no new file uploaded
            unset($data['background_image']);
        }

        $heroSlider->update($data);

        return redirect()->route('admin.hero-sliders.index')
            ->with('success', 'Hero slider updated successfully.');
    }

    public function destroy(HeroSlider $heroSlider)
    {
        $heroSlider->delete();

        return redirect()->route('admin.hero-sliders.index')
            ->with('success', 'Hero slider deleted successfully.');
    }
}
