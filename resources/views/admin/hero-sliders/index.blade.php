@extends('layouts.admin')

@section('title', 'Hero Sliders - VIS GmbH')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
                    <h1>Hero Sliders</h1>
                    <div>
                        <a href="{{ route('admin.hero-sliders.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus me-1"></i>Add New Slider
                        </a>
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
                        @if($heroSliders->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Subtitle</th>
                                            <th>Button Text</th>
                                            <th>Status</th>
                                            <th>Sort Order</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($heroSliders as $slider)
                                        <tr>
                                            <td>{{ $slider->title }}</td>
                                            <td>{{ $slider->subtitle ?: 'N/A' }}</td>
                                            <td>{{ $slider->button_text }}</td>
                                            <td>
                                                @if($slider->is_active)
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-secondary">Inactive</span>
                                                @endif
                                            </td>
                                            <td>{{ $slider->sort_order }}</td>
                                            <td>
                                                <a href="{{ route('admin.hero-sliders.show', $slider) }}" class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.hero-sliders.edit', $slider) }}" class="btn btn-sm btn-outline-warning">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.hero-sliders.destroy', $slider) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this slider?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="d-flex justify-content-center">
                                {{ $heroSliders->links() }}
                            </div>
                        @else
                            <p class="text-muted text-center py-4">No hero sliders found. <a href="{{ route('admin.hero-sliders.create') }}">Create your first slider</a></p>
                        @endif
                    </div>
                </div>
@endsection
