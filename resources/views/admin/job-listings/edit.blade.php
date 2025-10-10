@extends('layouts.admin')

@section('title', 'Edit Job Listing - VIS GmbH')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
                    <h1>Edit Job Listing</h1>
                    <div>
                        <a href="{{ route("admin.job-listings.index") }}" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left me-1"></i>Back to Job Listings
                        </a>
                    </div>
                </div>

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.job-listings.update', $jobListing) }}" method="POST">
                            @csrf
                            @method("PUT")
                            <div class="mb-3">
                                <label for="title" class="form-label">Title *</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $jobListing->title) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description *</label>
                                <textarea class="form-control" id="description" name="description" rows="4" required>{{ old('description', $jobListing->description) }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="location" class="form-label">Location</label>
                                <input type="text" class="form-control" id="location" name="location" value="{{ old('location', $jobListing->location) }}">
                            </div>
                            <div class="mb-3">
                                <label for="type" class="form-label">Type</label>
                                <input type="text" class="form-control" id="type" name="type" value="{{ old('type', $jobListing->type) }}">
                            </div>
                            <div class="mb-3">
                                <label for="requirements" class="form-label">Requirements</label>
                                <textarea class="form-control" id="requirements" name="requirements" rows="4">{{ old('requirements', $jobListing->requirements) }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="benefits" class="form-label">Benefits</label>
                                <textarea class="form-control" id="benefits" name="benefits" rows="4">{{ old('benefits', $jobListing->benefits) }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="salary_min" class="form-label">Salary Min</label>
                                <input type="number" class="form-control" id="salary_min" name="salary_min" value="{{ old('salary_min', $jobListing->salary_min) }}">
                            </div>
                            <div class="mb-3">
                                <label for="salary_max" class="form-label">Salary Max</label>
                                <input type="number" class="form-control" id="salary_max" name="salary_max" value="{{ old('salary_max', $jobListing->salary_max) }}">
                            </div>
                            <div class="mb-3">
                                <label for="application_deadline" class="form-label">Application Deadline</label>
                                <input type="date" class="form-control" id="application_deadline" name="application_deadline" value="{{ old('application_deadline', $jobListing->application_deadline ? $jobListing->application_deadline->format('Y-m-d') : '') }}">
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $jobListing->is_active) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">
                                        Is Active
                                    </label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="sort_order" class="form-label">Sort Order</label>
                                <input type="number" class="form-control" id="sort_order" name="sort_order" value="{{ old('sort_order', $jobListing->sort_order) }}">
                            </div>

                            <div class="d-flex justify-content-end">
                                <a href="{{ route("admin.job-listings.index") }}" class="btn btn-secondary me-2">Cancel</a>
                                <button type="submit" class="btn btn-primary">Update Job Listing</button>
                            </div>
                        </form>
                    </div>
                </div>
@endsection
