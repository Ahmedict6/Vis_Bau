<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FunFact;
use Illuminate\Http\Request;

class FunFactController extends Controller
{
    public function index()
    {
        $funFacts = FunFact::orderBy('sort_order')->paginate(20);
        return view('admin.fun-facts.index', compact('funFacts'));
    }

    public function create()
    {
        return view('admin.fun-facts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'number' => 'required|integer|min:0',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        // Handle icon file upload
        if ($request->hasFile('icon')) {
            $uploadedFiles = $this->handleImageUpload($request->file('icon'), 'fun-facts');
            $data['icon'] = $uploadedFiles['original'];
        }

        FunFact::create($data);

        return redirect()->route('admin.fun-facts.index')
            ->with('success', 'Fun fact created successfully.');
    }

    public function show(FunFact $funFact)
    {
        return view('admin.fun-facts.show', compact('funFact'));
    }

    public function edit(FunFact $funFact)
    {
        return view('admin.fun-facts.edit', compact('funFact'));
    }

    public function update(Request $request, FunFact $funFact)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'number' => 'required|integer|min:0',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        // Handle icon file upload
        if ($request->hasFile('icon')) {
            // Delete old icon if exists
            if ($funFact->icon) {
                $this->deleteImages($funFact->icon, 'fun-facts');
            }

            $uploadedFiles = $this->handleImageUpload($request->file('icon'), 'fun-facts');
            $data['icon'] = $uploadedFiles['original'];
        } else {
            // Keep existing icon if no new file uploaded
            unset($data['icon']);
        }

        $funFact->update($data);

        return redirect()->route('admin.fun-facts.index')
            ->with('success', 'Fun fact updated successfully.');
    }

    public function destroy(FunFact $funFact)
    {
        $funFact->delete();

        return redirect()->route('admin.fun-facts.index')
            ->with('success', 'Fun fact deleted successfully.');
    }
}
