<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutPageSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutPageController extends Controller
{
    /**
     * Display the about page settings
     */
    public function index()
    {
        $settings = AboutPageSetting::orderBy('group')->orderBy('sort_order')->get()->groupBy('group');

        return view('admin.about-page.index', compact('settings'));
    }

    /**
     * Update about page settings
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'settings' => 'required|array',
        ]);

        foreach ($request->settings as $key => $value) {
            $setting = AboutPageSetting::where('key', $key)->first();

            if ($setting) {
                // Handle file uploads for image type
                if ($setting->type === 'image' && $request->hasFile("settings.{$key}")) {
                    $file = $request->file("settings.{$key}");
                    $filename = time() . '_' . $file->getClientOriginalName();
                    $path = $file->storeAs('about-page', $filename, 'public');
                    $value = $path;

                    // Delete old image if it exists in storage
                    if ($setting->value && str_starts_with($setting->value, 'about-page/')) {
                        Storage::disk('public')->delete($setting->value);
                    }
                } elseif ($setting->type === 'boolean') {
                    $value = $request->has("settings.{$key}") ? '1' : '0';
                }

                $setting->update(['value' => $value]);
            }
        }

        return redirect()->route('admin.about-page.index')->with('success', 'About page settings updated successfully!');
    }

    /**
     * Toggle section visibility
     */
    public function toggleSection(Request $request, $key)
    {
        $setting = AboutPageSetting::where('key', $key)->firstOrFail();
        $setting->update(['is_active' => !$setting->is_active]);

        return redirect()->back()->with('success', 'Section visibility updated successfully!');
    }
}
