@extends('layouts.admin')

@section('title', 'Create Project - VIS GmbH')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
                    <h1>Create Project</h1>
                    <div>
                        <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left me-1"></i>Back to Projects
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
                        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">Title *</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description *</label>
                                <textarea class="form-control" id="description" name="description" rows="4" required>{{ old('description') }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="content" class="form-label">Content</label>
                                <textarea class="form-control" id="content" name="content" rows="6">{{ old('content') }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="featured_image" class="form-label">Featured Image *</label>
                                <input type="file" class="form-control" id="featured_image" name="featured_image" accept="image/*" required>
                                <div class="form-text">Upload an image file (JPG, PNG, WebP, etc.)</div>
                            </div>

                            <div class="mb-3">
                                <label for="gallery_images" class="form-label">Gallery Images</label>
                                <input type="file" class="form-control" id="gallery_images" name="gallery_images[]" accept="image/*" multiple>
                                <div class="form-text">Upload multiple images for the project gallery (JPG, PNG, WebP, etc.)</div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="client" class="form-label">Client</label>
                                        <input type="text" class="form-control" id="client" name="client" value="{{ old('client') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="location" class="form-label">Location</label>
                                        <input type="text" class="form-control" id="location" name="location" value="{{ old('location') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="project_type" class="form-label">Project Type</label>
                                        <input type="text" class="form-control" id="project_type" name="project_type" value="{{ old('project_type') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="completion_date" class="form-label">Completion Date</label>
                                        <input type="date" class="form-control" id="completion_date" name="completion_date" value="{{ old('completion_date') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="sort_order" class="form-label">Sort Order</label>
                                        <input type="number" class="form-control" id="sort_order" name="sort_order" value="{{ old('sort_order', 0) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <div class="form-check mt-4">
                                            <input class="form-check-input" type="checkbox" id="is_published" name="is_published" value="1" {{ old('is_published') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="is_published">
                                                Published
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="is_featured">
                                                Featured
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary me-2">Cancel</a>
                                <button type="submit" class="btn btn-primary">Create Project</button>
                            </div>
                        </form>
                    </div>
                </div>
@endsection
