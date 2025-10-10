@extends('layouts.admin')

@section('title', 'View Project - VIS GmbH')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
                    <h1>View Project</h1>
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

                        <div class="row mt-2">
                            <div class="col-md-6">
                                <strong>Title:</strong> {{ $project->title ?: 'N/A' }}
                            </div>
                        </div>
                        <hr>
                        <div class="mt-3">
                            <strong>Description:</strong>
                            <div class="mt-2 p-3 bg-light rounded">
                                {{ $project->description ?: 'N/A' }}
                            </div>
                        </div>
                        <hr>
                        <div class="mt-3">
                            <strong>Content:</strong>
                            <div class="mt-2 p-3 bg-light rounded">
                                {{ $project->content ?: 'N/A' }}
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <strong>Featured Image:</strong> {{ $project->featured_image ?: 'N/A' }}
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <strong>Client:</strong> {{ $project->client ?: 'N/A' }}
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <strong>Location:</strong> {{ $project->location ?: 'N/A' }}
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <strong>Project Type:</strong> {{ $project->project_type ?: 'N/A' }}
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <strong>Completion Date:</strong> {{ $project->completion_date ? $project->completion_date->format('M d, Y') : 'N/A' }}
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <strong>Is Published:</strong>
                                @if($project->is_published)
                                    <span class="badge bg-success">Yes</span>
                                @else
                                    <span class="badge bg-secondary">No</span>
                                @endif
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <strong>Is Featured:</strong>
                                @if($project->is_featured)
                                    <span class="badge bg-success">Yes</span>
                                @else
                                    <span class="badge bg-secondary">No</span>
                                @endif
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <strong>Sort Order:</strong> {{ $project->sort_order ?: 'N/A' }}
                            </div>
                        </div>
                    </div>
                </div>
@endsection
