<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BrandLogo;
use Illuminate\Http\Request;

class BrandLogoController extends Controller
{
    public function index()
    {
        $brandLogos = BrandLogo::orderBy('sort_order')->paginate(20);
        return view('admin.brand-logos.index', compact('brandLogos'));
    }

    public function create()
    {
        return view('admin.brand-logos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
            'website_url' => 'nullable|url|max:255',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        // Handle file upload
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/img/brand-logos'), $filename);
            $data['logo'] = $filename;
        }

        BrandLogo::create($data);

        return redirect()->route('admin.brand-logos.index')
            ->with('success', 'Brand logo created successfully.');
    }

    public function show(BrandLogo $brandLogo)
    {
        return view('admin.brand-logos.show', compact('brandLogo'));
    }

    public function edit(BrandLogo $brandLogo)
    {
        return view('admin.brand-logos.edit', compact('brandLogo'));
    }

    public function update(Request $request, BrandLogo $brandLogo)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
            'website_url' => 'nullable|url|max:255',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        // Handle file upload
        if ($request->hasFile('logo')) {
            // Delete old image if exists
            if ($brandLogo->logo && file_exists(public_path('assets/img/brand-logos/' . $brandLogo->logo))) {
                unlink(public_path('assets/img/brand-logos/' . $brandLogo->logo));
            }

            $file = $request->file('logo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/img/brand-logos'), $filename);
            $data['logo'] = $filename;
        } else {
            // Keep existing image if no new file uploaded
            unset($data['logo']);
        }

        $brandLogo->update($data);

        return redirect()->route('admin.brand-logos.index')
            ->with('success', 'Brand logo updated successfully.');
    }

    public function destroy(BrandLogo $brandLogo)
    {
        $brandLogo->delete();

        return redirect()->route('admin.brand-logos.index')
            ->with('success', 'Brand logo deleted successfully.');
    }
}
