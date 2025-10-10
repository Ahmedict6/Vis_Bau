@extends('layouts.admin')

@section('title', 'Services - VIS GmbH')
@section('page-title', 'Services')
@section('page-subtitle', 'Manage your service offerings')

@section('header-actions')
    <a href="{{ route('admin.services.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-1"></i>Add New Service
    </a>
    <a href="{{ route('home') }}" class="btn btn-outline-primary" target="_blank">
        <i class="fas fa-external-link-alt me-1"></i>View Website
    </a>
@endsection

@section('content')

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <div class="card">
                    <div class="card-body">
                        @if($services->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Price</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($services as $service)
                                        <tr>
                                            <td>{{ $service->title }}</td>
                                            <td>{{ Str::limit($service->description, 50) }}</td>
                                            <td>{{ $service->price ? '$' . number_format($service->price, 2) : 'N/A' }}</td>
                                            <td>
                                                @if($service->is_published)
                                                    <span class="badge bg-success">Published</span>
                                                @else
                                                    <span class="badge bg-secondary">Draft</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.services.show', $service) }}" class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.services.edit', $service) }}" class="btn btn-sm btn-outline-warning">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.services.destroy', $service) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this service?')">
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
                                {{ $services->links() }}
                            </div>
                        @else
                            <p class="text-muted text-center py-4">No services found. <a href="{{ route('admin.services.create') }}">Create your first service</a></p>
                        @endif
                    </div>
                </div>
@endsection
