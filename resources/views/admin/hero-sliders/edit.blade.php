@extends('layouts.admin')

@section('title', 'Edit Hero Slider - VIS GmbH')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
                    <h1>Edit Hero Slider</h1>
                    <div>
                        <a href="{{ route('admin.hero-sliders.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left me-1"></i>Back to Sliders
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
                        <form action="{{ route('admin.hero-sliders.update', $heroSlider) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Title *</label>
                                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $heroSlider->title) }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="subtitle" class="form-label">Subtitle</label>
                                        <input type="text" class="form-control" id="subtitle" name="subtitle" value="{{ old('subtitle', $heroSlider->subtitle) }}">
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description *</label>
                                <textarea class="form-control" id="description" name="description" rows="4" required>{{ old('description', $heroSlider->description) }}</textarea>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="button_text" class="form-label">Button Text *</label>
                                        <input type="text" class="form-control" id="button_text" name="button_text" value="{{ old('button_text', $heroSlider->button_text) }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="button_url" class="form-label">Button URL</label>
                                        <input type="url" class="form-control" id="button_url" name="button_url" value="{{ old('button_url', $heroSlider->button_url) }}">
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="background_image" class="form-label">Background Image *</label>
                                @if($heroSlider->background_image)
                                    <div class="mb-2">
                                        <img src="{{ asset('assets/img/slider/' . $heroSlider->background_image) }}" alt="Current image" class="img-thumbnail" style="max-width: 200px; max-height: 150px;">
                                        <div class="form-text">Current image</div>
                                    </div>
                                @endif
                                <input type="file" class="form-control" id="background_image" name="background_image" accept="image/*">
                                <div class="form-text">Upload a new image file (JPG, PNG, WebP, etc.) or leave empty to keep current image</div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="sort_order" class="form-label">Sort Order</label>
                                        <input type="number" class="form-control" id="sort_order" name="sort_order" value="{{ old('sort_order', $heroSlider->sort_order) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <div class="form-check mt-4">
                                            <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $heroSlider->is_active) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="is_active">
                                                Active
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <a href="{{ route('admin.hero-sliders.index') }}" class="btn btn-secondary me-2">Cancel</a>
                                <button type="submit" class="btn btn-primary">Update Slider</button>
                            </div>
                        </form>
                    </div>
                </div>
@endsection
