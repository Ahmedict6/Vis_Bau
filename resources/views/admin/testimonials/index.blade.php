@extends('layouts.admin')

@section('title', 'Testimonials - VIS GmbH')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
                    <h1>Testimonials</h1>
                    <div>
                        <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus me-1"></i>Add New Testimonial
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
                        @if($testimonials->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Designation</th>
                                            <th>Content</th>
                                            <th>Status</th>
                                            <th>Sort Order</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($testimonials as $testimonial)
                                        <tr>
                                            <td>{{ $testimonial->name }}</td>
                                            <td>{{ $testimonial->designation ?: 'N/A' }}</td>
                                            <td>{{ Str::limit($testimonial->content, 50) }}</td>
                                            <td>
                                                @if($testimonial->is_active)
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-secondary">Inactive</span>
                                                @endif
                                            </td>
                                            <td>{{ $testimonial->sort_order }}</td>
                                            <td>
                                                <a href="{{ route('admin.testimonials.show', $testimonial) }}" class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="btn btn-sm btn-outline-warning">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this testimonial?')">
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
                                {{ $testimonials->links() }}
                            </div>
                        @else
                            <p class="text-muted text-center py-4">No testimonials found. <a href="{{ route('admin.testimonials.create') }}">Create your first testimonial</a></p>
                        @endif
                    </div>
                </div>
@endsection
