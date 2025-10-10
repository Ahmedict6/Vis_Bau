<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobListing;
use Illuminate\Http\Request;

class JobListingController extends Controller
{
    public function index()
    {
        $jobListings = JobListing::orderBy('sort_order')->paginate(20);
        return view('admin.job-listings.index', compact('jobListings'));
    }

    public function create()
    {
        return view('admin.job-listings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'type' => 'nullable|string|max:255',
            'requirements' => 'nullable|string',
            'benefits' => 'nullable|string',
            'salary_min' => 'nullable|numeric|min:0',
            'salary_max' => 'nullable|numeric|min:0',
            'application_deadline' => 'nullable|date',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        JobListing::create($data);

        return redirect()->route('admin.job-listings.index')
            ->with('success', 'Job listing created successfully.');
    }

    public function show(JobListing $jobListing)
    {
        return view('admin.job-listings.show', compact('jobListing'));
    }

    public function edit(JobListing $jobListing)
    {
        return view('admin.job-listings.edit', compact('jobListing'));
    }

    public function update(Request $request, JobListing $jobListing)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'type' => 'nullable|string|max:255',
            'requirements' => 'nullable|string',
            'benefits' => 'nullable|string',
            'salary_min' => 'nullable|numeric|min:0',
            'salary_max' => 'nullable|numeric|min:0',
            'application_deadline' => 'nullable|date',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        $jobListing->update($data);

        return redirect()->route('admin.job-listings.index')
            ->with('success', 'Job listing updated successfully.');
    }

    public function destroy(JobListing $jobListing)
    {
        $jobListing->delete();

        return redirect()->route('admin.job-listings.index')
            ->with('success', 'Job listing deleted successfully.');
    }
}
