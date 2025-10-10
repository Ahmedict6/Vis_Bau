<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SectionSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SectionSettingController extends Controller
{
    /**
     * Display a listing of the section settings.
     */
    public function index()
    {
        $sections = SectionSetting::orderBy('sort_order')->get();
        return view('admin.section-settings.index', compact('sections'));
    }

    /**
     * Toggle section active status.
     */
    public function toggle(SectionSetting $sectionSetting)
    {
        $sectionSetting->update([
            'is_active' => !$sectionSetting->is_active
        ]);

        return redirect()->back()->with('success', 'Section status updated successfully!');
    }

    /**
     * Update the specified section setting.
     */
    public function update(Request $request, SectionSetting $sectionSetting)
    {
        $validated = $request->validate([
            'section_name' => 'required|string|max:255',
            'section_description' => 'nullable|string',
            'is_active' => 'boolean',
            'sort_order' => 'required|integer|min:0',
        ]);

        $sectionSetting->update($validated);

        return redirect()->back()->with('success', 'Section updated successfully!');
    }

    /**
     * Update sort order via AJAX
     */
    public function updateOrder(Request $request)
    {
        $validated = $request->validate([
            'sections' => 'required|array',
            'sections.*.id' => 'required|exists:section_settings,id',
            'sections.*.sort_order' => 'required|integer|min:0',
        ]);

        foreach ($validated['sections'] as $section) {
            SectionSetting::where('id', $section['id'])
                ->update(['sort_order' => $section['sort_order']]);
        }

        Cache::forget('homepage_data');

        return response()->json(['success' => true, 'message' => 'Order updated successfully!']);
    }
}
