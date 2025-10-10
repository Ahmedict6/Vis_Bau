@extends('layouts.admin')

@section('title', 'View Testimonial - VIS GmbH')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
                    <h1>View Testimonial</h1>
                    <div>
                        <a href="{{ route("admin.testimonials.index") }}" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left me-1"></i>Back to Testimonials
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

                        <div class="row">
                            <div class="col-md-6">
                                <strong>Name:</strong> {{ $testimonial->name }}
                            </div>
                            <div class="col-md-6">
                                <strong>Designation:</strong> {{ $testimonial->designation ?: 'N/A' }}
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <strong>Image:</strong> {{ $testimonial->image ?: 'N/A' }}
                            </div>
                            <div class="col-md-6">
                                <strong>Status:</strong>
                                @if($testimonial->is_active)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-secondary">Inactive</span>
                                @endif
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <strong>Sort Order:</strong> {{ $testimonial->sort_order }}
                            </div>
                            <div class="col-md-6">
                                <strong>Created:</strong> {{ $testimonial->created_at->format('M d, Y H:i') }}
                            </div>
                        </div>
                        <hr>
                        <div class="mt-3">
                            <strong>Content:</strong>
                            <div class="mt-2 p-3 bg-light rounded">
                                {{ $testimonial->content }}
                            </div>
                        </div>
                    </div>
                </div>
@endsection
