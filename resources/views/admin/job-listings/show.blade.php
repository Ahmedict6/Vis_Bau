@extends('layouts.admin')

@section('title', 'View Job Listing - VIS GmbH')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
                    <h1>View Job Listing</h1>
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

                        <div class="row mt-2">
                            <div class="col-md-6">
                                <strong>Title:</strong> {{ $jobListing->title ?: 'N/A' }}
                            </div>
                        </div>
                        <hr>
                        <div class="mt-3">
                            <strong>Description:</strong>
                            <div class="mt-2 p-3 bg-light rounded">
                                {{ $jobListing->description ?: 'N/A' }}
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <strong>Location:</strong> {{ $jobListing->location ?: 'N/A' }}
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <strong>Type:</strong> {{ $jobListing->type ?: 'N/A' }}
                            </div>
                        </div>
                        <hr>
                        <div class="mt-3">
                            <strong>Requirements:</strong>
                            <div class="mt-2 p-3 bg-light rounded">
                                {{ $jobListing->requirements ?: 'N/A' }}
                            </div>
                        </div>
                        <hr>
                        <div class="mt-3">
                            <strong>Benefits:</strong>
                            <div class="mt-2 p-3 bg-light rounded">
                                {{ $jobListing->benefits ?: 'N/A' }}
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <strong>Salary Min:</strong> {{ $jobListing->salary_min ?: 'N/A' }}
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <strong>Salary Max:</strong> {{ $jobListing->salary_max ?: 'N/A' }}
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <strong>Application Deadline:</strong> {{ $jobListing->application_deadline ? $jobListing->application_deadline->format('M d, Y') : 'N/A' }}
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <strong>Is Active:</strong>
                                @if($jobListing->is_active)
                                    <span class="badge bg-success">Yes</span>
                                @else
                                    <span class="badge bg-secondary">No</span>
                                @endif
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <strong>Sort Order:</strong> {{ $jobListing->sort_order ?: 'N/A' }}
                            </div>
                        </div>
                    </div>
                </div>
@endsection
