@extends('layouts.admin')

@section('title', 'Brand Logos - VIS GmbH')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
                    <h1>Brand Logos</h1>
                    <div>
                        <a href="{{ route('admin.brand-logos.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus me-1"></i>Add New Logo
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
                        @if($brandLogos->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Logo</th>
                                            <th>Website URL</th>
                                            <th>Status</th>
                                            <th>Sort Order</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($brandLogos as $logo)
                                        <tr>
                                            <td>{{ $logo->name }}</td>
                                            <td>
                                                @if($logo->logo)
                                                    <img src="{{ asset('assets/img/brand-logos/' . $logo->logo) }}" alt="{{ $logo->name }}" style="max-width: 50px; max-height: 30px;">
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                            <td>
                                                @if($logo->website_url)
                                                    <a href="{{ $logo->website_url }}" target="_blank" class="text-decoration-none">
                                                        {{ Str::limit($logo->website_url, 30) }}
                                                    </a>
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                            <td>
                                                @if($logo->is_active)
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-secondary">Inactive</span>
                                                @endif
                                            </td>
                                            <td>{{ $logo->sort_order }}</td>
                                            <td>
                                                <a href="{{ route('admin.brand-logos.show', $logo) }}" class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.brand-logos.edit', $logo) }}" class="btn btn-sm btn-outline-warning">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.brand-logos.destroy', $logo) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this brand logo?')">
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
                                {{ $brandLogos->links() }}
                            </div>
                        @else
                            <p class="text-muted text-center py-4">No brand logos found. <a href="{{ route('admin.brand-logos.create') }}">Add your first brand logo</a></p>
                        @endif
                    </div>
                </div>
@endsection
