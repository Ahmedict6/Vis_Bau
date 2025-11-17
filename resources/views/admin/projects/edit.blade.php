@extends('layouts.admin')

@section('title', 'Edit Project - VIS GmbH')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
                    <h1>Edit Project</h1>
                    <div>
                        <a href="{{ route("admin.projects.index") }}" class="btn btn-outline-secondary">
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
                        <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="title" class="form-label">Title *</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $project->title) }}" required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description *</label>
                                <textarea class="form-control" id="description" name="description" rows="4" required>{{ old('description', $project->description) }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="content" class="form-label">Content</label>
                                <textarea class="form-control" id="content" name="content" rows="6">{{ old('content', $project->content) }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="featured_image" class="form-label">Featured Image</label>
                                @if($project->featured_image)
                                    <div class="mb-2">
                                        <img src="{{ asset('assets/img/projects/' . $project->featured_image) }}" alt="Current image" class="img-thumbnail" style="max-width: 200px; max-height: 150px;">
                                        <div class="form-text">Current image</div>
                                    </div>
                                @endif
                                <input type="file" class="form-control" id="featured_image" name="featured_image" accept="image/*">
                                <div class="form-text">Upload a new image file (JPG, PNG, WebP, etc.) or leave empty to keep current image</div>
                            </div>

                            <div class="mb-3">
                                <label for="gallery_images" class="form-label">Gallery Images</label>
                                @if($project->gallery)
                                    <div class="mb-2">
                                        @foreach(json_decode($project->gallery) as $galleryImage)
                                            <img src="{{ asset('assets/img/projects/' . $galleryImage) }}" alt="Gallery image" class="img-thumbnail me-2 mb-2" style="max-width: 100px; max-height: 75px;">
                                        @endforeach
                                        <div class="form-text">Current gallery images</div>
                                    </div>
                                @endif
                                <input type="file" class="form-control" id="gallery_images" name="gallery_images[]" accept="image/*" multiple>
                                <div class="form-text">Upload additional images for the project gallery (JPG, PNG, WebP, etc.) or leave empty to keep current images</div>
                            </div>
                            <div class="mb-3">
                                <label for="client" class="form-label">Client</label>
                                <input type="text" class="form-control" id="client" name="client" value="{{ old('client', $project->client) }}">
                            </div>
                            <div class="mb-3">
                                <label for="location" class="form-label">Location</label>
                                <input type="text" class="form-control" id="location" name="location" value="{{ old('location', $project->location) }}">
                            </div>
                            <div class="mb-3">
                                <label for="project_type" class="form-label">Project Type</label>
                                <input type="text" class="form-control" id="project_type" name="project_type" value="{{ old('project_type', $project->project_type) }}">
                            </div>
                            <div class="mb-3">
                                <label for="completion_date" class="form-label">Completion Date</label>
                                <input type="date" class="form-control" id="completion_date" name="completion_date" value="{{ old('completion_date', $project->completion_date ? $project->completion_date->format('Y-m-d') : '') }}">
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="is_published" name="is_published" value="1" {{ old('is_published', $project->is_published) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_published">
                                        Is Published
                                    </label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" value="1" {{ old('is_featured', $project->is_featured) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_featured">
                                        Is Featured
                                    </label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="sort_order" class="form-label">Sort Order</label>
                                <input type="number" class="form-control" id="sort_order" name="sort_order" value="{{ old('sort_order', $project->sort_order) }}">
                            </div>

                            <div class="d-flex justify-content-end">
                                <a href="{{ route("admin.projects.index") }}" class="btn btn-secondary me-2">Cancel</a>
                                <button type="submit" class="btn btn-primary">Update Project</button>
                            </div>
                        </form>
                    </div>
                </div>
@endsection
