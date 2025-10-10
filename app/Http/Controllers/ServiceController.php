<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\SectionSetting;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        // Check if Services section is active
        if (!SectionSetting::isSectionActive('services')) {
            abort(404, 'Services section is currently unavailable.');
        }

        $query = Service::query()->where('is_published', true);

        // Search functionality
        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('title', 'like', "%{$searchTerm}%")
                  ->orWhere('description', 'like', "%{$searchTerm}%")
                  ->orWhere('content', 'like', "%{$searchTerm}%");
            });
        }

        $services = $query->orderBy('sort_order')->paginate(12);

        return view('services.index', compact('services'));
    }

    public function show(Service $service)
    {
        // Check if Services section is active
        if (!SectionSetting::isSectionActive('services')) {
            abort(404, 'Services section is currently unavailable.');
        }

        if (!$service->is_published) {
            abort(404);
        }

        $relatedServices = Service::where('is_published', true)
            ->where('id', '!=', $service->id)
            ->take(3)
            ->get();

        return view('services.show', compact('service', 'relatedServices'));
    }
}
