@extends('layouts.admin')

@section('title', 'Edit Home Video - VIS GmbH')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Edit Home Video</h1>
    <div>
        <a href="{{ route('admin.home-videos.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-1"></i>Back
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
        <form action="{{ route('admin.home-videos.update', $homeVideo) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Title *</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $homeVideo->title) }}" required>
                <div class="form-text">Enter a title for the video section</div>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="4">{{ old('description', $homeVideo->description) }}</textarea>
                <div class="form-text">Enter a description for the video (optional)</div>
            </div>

            <div class="mb-3">
                <label for="video" class="form-label">Video File</label>
                @if($homeVideo->video_path)
                    <div class="mb-2">
                        <video controls style="width: 100%; max-width: 400px; max-height: 300px; background: #000;">
                            <source src="{{ asset('assets/videos/' . $homeVideo->video_path) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                        <div class="form-text">Current video</div>
                    </div>
                @endif
                <input type="file" class="form-control" id="video" name="video" accept="video/mp4,video/webm,video/ogv">
                <div class="form-text">Upload a new video file (MP4, WebM, or OGV format). Maximum file size: 50MB. Leave empty to keep current video.</div>
            </div>

            <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $homeVideo->is_active) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_active">
                        Active (Video will be displayed on homepage)
                    </label>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <a href="{{ route('admin.home-videos.index') }}" class="btn btn-secondary me-2">Cancel</a>
                <button type="submit" class="btn btn-primary">Update Video</button>
            </div>
        </form>
    </div>
</div>
@endsection

