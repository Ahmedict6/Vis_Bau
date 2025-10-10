@extends('layouts.admin')

@section('title', 'View Blog Post - VIS GmbH')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
                    <h1>View Blog Post</h1>
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

                        <div class="row mt-2">
                            <div class="col-md-6">
                                <strong>Title:</strong> {{ $blogPost->title ?: 'N/A' }}
                            </div>
                        </div>
                        <hr>
                        <div class="mt-3">
                            <strong>Excerpt:</strong>
                            <div class="mt-2 p-3 bg-light rounded">
                                {{ $blogPost->excerpt ?: 'N/A' }}
                            </div>
                        </div>
                        <hr>
                        <div class="mt-3">
                            <strong>Content:</strong>
                            <div class="mt-2 p-3 bg-light rounded">
                                {{ $blogPost->content ?: 'N/A' }}
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <strong>Featured Image:</strong> {{ $blogPost->featured_image ?: 'N/A' }}
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <strong>Author:</strong> {{ $blogPost->author ?: 'N/A' }}
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <strong>Category:</strong> {{ $blogPost->category ?: 'N/A' }}
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <strong>Meta Title:</strong> {{ $blogPost->meta_title ?: 'N/A' }}
                            </div>
                        </div>
                        <hr>
                        <div class="mt-3">
                            <strong>Meta Description:</strong>
                            <div class="mt-2 p-3 bg-light rounded">
                                {{ $blogPost->meta_description ?: 'N/A' }}
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <strong>Is Published:</strong>
                                @if($blogPost->is_published)
                                    <span class="badge bg-success">Yes</span>
                                @else
                                    <span class="badge bg-secondary">No</span>
                                @endif
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <strong>Published At:</strong> {{ $blogPost->published_at ? $blogPost->published_at->format('M d, Y H:i') : 'N/A' }}
                            </div>
                        </div>
                    </div>
                </div>
@endsection
