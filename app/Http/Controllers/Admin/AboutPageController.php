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

                    // Determine the appropriate assets subdirectory based on the setting key
                    $assetsDir = 'assets/img/about-page/';
                    if (str_contains($key, 'icon')) {
                        $assetsDir = 'assets/img/icons/';
                    } elseif (str_contains($key, 'image')) {
                        $assetsDir = 'assets/img/about/';
                    }

                    // Ensure directory exists
                    $fullPath = public_path($assetsDir);
                    if (!file_exists($fullPath)) {
                        mkdir($fullPath, 0755, true);
                    }

                    // Move file to assets directory
                    $file->move($fullPath, $filename);
                    $value = $assetsDir . $filename;

                    // Delete old image if it exists
                    if ($setting->value) {
                        $oldPath = public_path($setting->value);
                        if (file_exists($oldPath)) {
                            unlink($oldPath);
                        }
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
