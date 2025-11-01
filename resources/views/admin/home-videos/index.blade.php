@extends('layouts.admin')

@section('title', 'Home Video - VIS GmbH')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Home Video</h1>
    <div>
        @if($homeVideo)
            <a href="{{ route('admin.home-videos.edit', $homeVideo) }}" class="btn btn-warning">
                <i class="fas fa-edit me-1"></i>Edit Video
            </a>
        @else
            <a href="{{ route('admin.home-videos.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-1"></i>Add Video
            </a>
        @endif
        <a href="{{ route('home') }}" class="btn btn-outline-primary" target="_blank">
            <i class="fas fa-external-link-alt me-1"></i>View Website
        </a>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="card">
    <div class="card-body">
        @if($homeVideo)
            <div class="row">
                <div class="col-md-6">
                    <h5 class="mb-3">Video Information</h5>
                    <table class="table table-bordered">
                        <tr>
                            <th width="30%">Title:</th>
                            <td>{{ $homeVideo->title }}</td>
                        </tr>
                        <tr>
                            <th>Description:</th>
                            <td>{{ $homeVideo->description ?: 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Status:</th>
                            <td>
                                @if($homeVideo->is_active)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-secondary">Inactive</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Created:</th>
                            <td>{{ $homeVideo->created_at->format('M d, Y H:i') }}</td>
                        </tr>
                        <tr>
                            <th>Updated:</th>
                            <td>{{ $homeVideo->updated_at->format('M d, Y H:i') }}</td>
                        </tr>
                    </table>

                    <div class="mt-3">
                        <a href="{{ route('admin.home-videos.edit', $homeVideo) }}" class="btn btn-warning">
                            <i class="fas fa-edit me-1"></i>Edit Video
                        </a>
                        <form action="{{ route('admin.home-videos.destroy', $homeVideo) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this video? This action cannot be undone.')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-trash me-1"></i>Delete Video
                            </button>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <h5 class="mb-3">Video Preview</h5>
                    @if($homeVideo->video_path)
                        <div class="video-preview">
                            <video controls style="width: 100%; max-height: 400px; background: #000;">
                                <source src="{{ asset('assets/videos/' . $homeVideo->video_path) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    @else
                        <p class="text-muted">No video uploaded.</p>
                    @endif
                </div>
            </div>
        @else
            <div class="text-center py-5">
                <i class="fas fa-video fa-3x text-muted mb-3"></i>
                <p class="text-muted">No video has been added yet.</p>
                <a href="{{ route('admin.home-videos.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-1"></i>Add Your First Video
                </a>
            </div>
        @endif
    </div>
</div>
@endsection

