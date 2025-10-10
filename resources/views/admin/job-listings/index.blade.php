@extends('layouts.admin')

@section('title', 'Job Listings - VIS GmbH')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
                    <h1>Job Listings</h1>
                    <div>
                        <a href="{{ route('admin.job-listings.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus me-1"></i>Add New Job
                        </a>
                        <a href="{{ route('home') }}" class="btn btn-outline-primary" target="_blank">
                            <i class="fas fa-external-link-alt me-1"></i>View Website
                        </a>
                    </div>
                </div>

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <div class="card">
                    <div class="card-body">
                        @if($jobListings->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Location</th>
                                            <th>Type</th>
                                            <th>Salary Range</th>
                                            <th>Status</th>
                                            <th>Deadline</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($jobListings as $job)
                                        <tr>
                                            <td>{{ $job->title }}</td>
                                            <td>{{ $job->location ?: 'N/A' }}</td>
                                            <td>{{ $job->type ?: 'N/A' }}</td>
                                            <td>
                                                @if($job->salary_min && $job->salary_max)
                                                    ${{ number_format($job->salary_min) }} - ${{ number_format($job->salary_max) }}
                                                @elseif($job->salary_min)
                                                    ${{ number_format($job->salary_min) }}+
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                            <td>
                                                @if($job->is_active)
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-secondary">Inactive</span>
                                                @endif
                                            </td>
                                            <td>{{ $job->application_deadline ? $job->application_deadline->format('M d, Y') : 'N/A' }}</td>
                                            <td>
                                                <a href="{{ route('admin.job-listings.show', $job) }}" class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.job-listings.edit', $job) }}" class="btn btn-sm btn-outline-warning">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.job-listings.destroy', $job) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this job listing?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="d-flex justify-content-center">
                                {{ $jobListings->links() }}
                            </div>
                        @else
                            <p class="text-muted text-center py-4">No job listings found. <a href="{{ route('admin.job-listings.create') }}">Post your first job</a></p>
                        @endif
                    </div>
                </div>
@endsection
