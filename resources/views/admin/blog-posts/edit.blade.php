@extends('layouts.admin')

@section('title', 'Edit Blog Post - VIS GmbH')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
                    <h1>Edit Blog Post</h1>
                    <div>
                        <a href="{{ route("admin.blog-posts.index") }}" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left me-1"></i>Back to Blog Posts
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
                        <form action="{{ route('admin.blog-posts.update', $blogPost) }}" method="POST">
                            @csrf
                            @method("PUT")
                            <div class="mb-3">
                                <label for="title" class="form-label">Title *</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $blogPost->title) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="excerpt" class="form-label">Excerpt</label>
                                <textarea class="form-control" id="excerpt" name="excerpt" rows="4">{{ old('excerpt', $blogPost->excerpt) }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="content" class="form-label">Content *</label>
                                <textarea class="form-control" id="content" name="content" rows="4" required>{{ old('content', $blogPost->content) }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="featured_image" class="form-label">Featured Image</label>
                                <input type="text" class="form-control" id="featured_image" name="featured_image" value="{{ old('featured_image', $blogPost->featured_image) }}">
                            </div>
                            <div class="mb-3">
                                <label for="author" class="form-label">Author</label>
                                <input type="text" class="form-control" id="author" name="author" value="{{ old('author', $blogPost->author) }}">
                            </div>
                            <div class="mb-3">
                                <label for="category" class="form-label">Category</label>
                                <input type="text" class="form-control" id="category" name="category" value="{{ old('category', $blogPost->category) }}">
                            </div>
                            <div class="mb-3">
                                <label for="meta_title" class="form-label">Meta Title</label>
                                <input type="text" class="form-control" id="meta_title" name="meta_title" value="{{ old('meta_title', $blogPost->meta_title) }}">
                            </div>
                            <div class="mb-3">
                                <label for="meta_description" class="form-label">Meta Description</label>
                                <textarea class="form-control" id="meta_description" name="meta_description" rows="4">{{ old('meta_description', $blogPost->meta_description) }}</textarea>
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="is_published" name="is_published" value="1" {{ old('is_published', $blogPost->is_published) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_published">
                                        Is Published
                                    </label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="published_at" class="form-label">Published At</label>
                                <input type="datetime-local" class="form-control" id="published_at" name="published_at" value="{{ old('published_at', $blogPost->published_at ? $blogPost->published_at->format('Y-m-d\TH:i') : '') }}">
                            </div>

                            <div class="d-flex justify-content-end">
                                <a href="{{ route("admin.blog-posts.index") }}" class="btn btn-secondary me-2">Cancel</a>
                                <button type="submit" class="btn btn-primary">Update Blog Post</button>
                            </div>
                        </form>
                    </div>
                </div>
@endsection
