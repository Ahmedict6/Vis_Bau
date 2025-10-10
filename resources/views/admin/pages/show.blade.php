@extends('layouts.admin')

@section('title', 'View Page - VIS GmbH')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
                    <h1>View Page</h1>
                    <div>
                        <a href="{{ route('admin.pages.edit', $page) }}" class="btn btn-warning me-2">
                            <i class="fas fa-edit me-1"></i>Edit
                        </a>
                        <a href="{{ route('admin.pages.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left me-1"></i>Back to Pages
                        </a>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">{{ $page->title }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <strong>Slug:</strong> {{ $page->slug }}
                            </div>
                            <div class="col-md-6">
                                <strong>Status:</strong>
                                @if($page->is_published)
                                    <span class="badge bg-success">Published</span>
                                @else
                                    <span class="badge bg-secondary">Draft</span>
                                @endif
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <strong>Sort Order:</strong> {{ $page->sort_order }}
                            </div>
                            <div class="col-md-6">
                                <strong>Created:</strong> {{ $page->created_at->format('M d, Y H:i') }}
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <strong>Updated:</strong> {{ $page->updated_at->format('M d, Y H:i') }}
                            </div>
                            <div class="col-md-6">
                                <strong>Featured Image:</strong> {{ $page->featured_image ?: 'N/A' }}
                            </div>
                        </div>

                        @if($page->excerpt)
                        <hr>
                        <div class="mt-3">
                            <strong>Excerpt:</strong>
                            <div class="mt-2 p-3 bg-light rounded">
                                {{ $page->excerpt }}
                            </div>
                        </div>
                        @endif

                        <hr>
                        <div class="mt-3">
                            <strong>Content:</strong>
                            <div class="mt-2 p-3 bg-light rounded">
                                {!! nl2br(e($page->content)) !!}
                            </div>
                        </div>

                        @if($page->meta_title || $page->meta_description)
                        <hr>
                        <div class="mt-3">
                            <h6>SEO Information</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <strong>Meta Title:</strong> {{ $page->meta_title ?: 'N/A' }}
                                </div>
                                <div class="col-md-6">
                                    <strong>Meta Description:</strong> {{ $page->meta_description ?: 'N/A' }}
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
@endsection
