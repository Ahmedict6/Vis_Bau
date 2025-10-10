@extends('layouts.admin')

@section('title', 'Facts - VIS GmbH')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
                    <h1>Facts</h1>
                    <div>
                        <a href="{{ route('admin.fun-facts.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus me-1"></i>Add New Fact
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
                        @if($funFacts->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Number</th>
                                            <th>Icon</th>
                                            <th>Status</th>
                                            <th>Sort Order</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($funFacts as $fact)
                                        <tr>
                                            <td>{{ $fact->title }}</td>
                                            <td><strong>{{ number_format($fact->number) }}</strong></td>
                                            <td>{{ $fact->icon ?: 'N/A' }}</td>
                                            <td>
                                                @if($fact->is_active)
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-secondary">Inactive</span>
                                                @endif
                                            </td>
                                            <td>{{ $fact->sort_order }}</td>
                                            <td>
                                                <a href="{{ route('admin.fun-facts.show', $fact) }}" class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.fun-facts.edit', $fact) }}" class="btn btn-sm btn-outline-warning">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.fun-facts.destroy', $fact) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this fun fact?')">
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
                                {{ $funFacts->links() }}
                            </div>
                        @else
                            <p class="text-muted text-center py-4">No Facts found. <a href="{{ route('admin.fun-facts.create') }}">Create your first fun fact</a></p>
                        @endif
                    </div>
                </div>
@endsection
