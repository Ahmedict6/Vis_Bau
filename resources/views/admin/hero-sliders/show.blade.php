@extends('layouts.admin')

@section('title', 'View Hero Slider - VIS GmbH')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
                    <h1>View Hero Slider</h1>
                    <div>
                        <a href="{{ route('admin.hero-sliders.edit', $heroSlider) }}" class="btn btn-warning me-2">
                            <i class="fas fa-edit me-1"></i>Edit
                        </a>
                        <a href="{{ route('admin.hero-sliders.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left me-1"></i>Back to Sliders
                        </a>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Slider Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <strong>Title:</strong> {{ $heroSlider->title }}
                            </div>
                            <div class="col-md-6">
                                <strong>Subtitle:</strong> {{ $heroSlider->subtitle ?: 'N/A' }}
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <strong>Button Text:</strong> {{ $heroSlider->button_text }}
                            </div>
                            <div class="col-md-6">
                                <strong>Button URL:</strong> {{ $heroSlider->button_url ?: 'N/A' }}
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <strong>Background Image:</strong> {{ $heroSlider->background_image }}
                            </div>
                            <div class="col-md-6">
                                <strong>Status:</strong>
                                @if($heroSlider->is_active)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-secondary">Inactive</span>
                                @endif
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <strong>Sort Order:</strong> {{ $heroSlider->sort_order }}
                            </div>
                            <div class="col-md-6">
                                <strong>Created:</strong> {{ $heroSlider->created_at->format('M d, Y H:i') }}
                            </div>
                        </div>
                        <hr>
                        <div class="mt-3">
                            <strong>Description:</strong>
                            <div class="mt-2 p-3 bg-light rounded">
                                {{ $heroSlider->description }}
                            </div>
                        </div>
                    </div>
                </div>
@endsection
