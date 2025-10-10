@extends('layouts.admin')

@section('title', 'Admin Dashboard - VIS GmbH')
@section('page-title', 'Dashboard')
@section('page-subtitle', 'Welcome to your admin dashboard')

@section('header-actions')
    <a href="{{ route('home') }}" class="btn btn-outline-primary" target="_blank">
        <i class="fas fa-external-link-alt me-1"></i>View Website
    </a>
@endsection

@section('content')

                <!-- Statistics Cards -->
                <div class="row mb-4">
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card stat-card success">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="stat-label">Hero Sliders</p>
                                        <h3 class="stat-number">{{ $stats['hero_sliders'] ?? 0 }}</h3>
                                    </div>
                                    <div class="stat-icon success">
                                        <i class="fas fa-images"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card stat-card info">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="stat-label">Facts</p>
                                        <h3 class="stat-number">{{ $stats['fun_facts'] ?? 0 }}</h3>
                                    </div>
                                    <div class="stat-icon info">
                                        <i class="fas fa-chart-bar"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card stat-card warning">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="stat-label">Testimonials</p>
                                        <h3 class="stat-number">{{ $stats['testimonials'] ?? 0 }}</h3>
                                    </div>
                                    <div class="stat-icon warning">
                                        <i class="fas fa-quote-left"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card stat-card danger">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="stat-label">Team Members</p>
                                        <h3 class="stat-number">{{ $stats['team_members'] ?? 0 }}</h3>
                                    </div>
                                    <div class="stat-icon danger">
                                        <i class="fas fa-users"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card stat-card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="stat-label">Job Listings</p>
                                        <h3 class="stat-number">{{ $stats['job_listings'] ?? 0 }}</h3>
                                    </div>
                                    <div class="stat-icon primary">
                                        <i class="fas fa-briefcase"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card stat-card success">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="stat-label">Brand Logos</p>
                                        <h3 class="stat-number">{{ $stats['brand_logos'] ?? 0 }}</h3>
                                    </div>
                                    <div class="stat-icon success">
                                        <i class="fas fa-building"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card stat-card info">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="stat-label">Services</p>
                                        <h3 class="stat-number">{{ $stats['services'] ?? 0 }}</h3>
                                    </div>
                                    <div class="stat-icon info">
                                        <i class="fas fa-cogs"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card stat-card warning">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="stat-label">Projects</p>
                                        <h3 class="stat-number">{{ $stats['projects'] ?? 0 }}</h3>
                                    </div>
                                    <div class="stat-icon warning">
                                        <i class="fas fa-project-diagram"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card stat-card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="stat-label">Blog Posts</p>
                                        <h3 class="stat-number">{{ $stats['blog_posts'] ?? 0 }}</h3>
                                    </div>
                                    <div class="stat-icon primary">
                                        <i class="fas fa-blog"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card stat-card success">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="stat-label">Pages</p>
                                        <h3 class="stat-number">{{ $stats['pages'] ?? 0 }}</h3>
                                    </div>
                                    <div class="stat-icon success">
                                        <i class="fas fa-file-alt"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card stat-card danger">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="stat-label">Contact Messages</p>
                                        <h3 class="stat-number">{{ $stats['contact_messages'] ?? 0 }}</h3>
                                    </div>
                                    <div class="stat-icon danger">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Cache Management -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">
                                    <i class="fas fa-server me-2"></i>Cache Management
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <div class="d-flex align-items-center justify-content-between p-3 border rounded">
                                            <div>
                                                <h6 class="mb-1">Clear All Caches</h6>
                                                <small class="text-muted">Clear application, config, route, and view caches</small>
                                            </div>
                                            <form action="{{ route('admin.cache.clear-all') }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to clear all caches?')">
                                                    <i class="fas fa-trash-alt me-1"></i>Clear All
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="d-flex align-items-center justify-content-between p-3 border rounded">
                                            <div>
                                                <h6 class="mb-1">Application Cache</h6>
                                                <small class="text-muted">Clear data cache only</small>
                                            </div>
                                            <form action="{{ route('admin.cache.clear-app') }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-warning btn-sm">
                                                    <i class="fas fa-broom me-1"></i>Clear
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="d-flex align-items-center justify-content-between p-3 border rounded">
                                            <div>
                                                <h6 class="mb-1">Configuration Cache</h6>
                                                <small class="text-muted">Clear cached configuration files</small>
                                            </div>
                                            <form action="{{ route('admin.cache.clear-config') }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-info btn-sm">
                                                    <i class="fas fa-cog me-1"></i>Clear
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="d-flex align-items-center justify-content-between p-3 border rounded">
                                            <div>
                                                <h6 class="mb-1">View Cache</h6>
                                                <small class="text-muted">Clear compiled blade templates</small>
                                            </div>
                                            <form action="{{ route('admin.cache.clear-view') }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-success btn-sm">
                                                    <i class="fas fa-eye me-1"></i>Clear
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="d-flex align-items-center justify-content-between p-3 border rounded">
                                            <div>
                                                <h6 class="mb-1">Route Cache</h6>
                                                <small class="text-muted">Clear cached routes</small>
                                            </div>
                                            <form action="{{ route('admin.cache.clear-route') }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-primary btn-sm">
                                                    <i class="fas fa-route me-1"></i>Clear
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="d-flex align-items-center justify-content-between p-3 border rounded">
                                            <div>
                                                <h6 class="mb-1">Optimize Application</h6>
                                                <small class="text-muted">Clear then cache config, routes, and views</small>
                                            </div>
                                            <form action="{{ route('admin.cache.optimize') }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-success btn-sm">
                                                    <i class="fas fa-bolt me-1"></i>Optimize
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Contact Messages -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">
                                        <i class="fas fa-envelope me-2"></i>Recent Contact Messages
                                    </h5>
                                    <a href="{{ route('admin.contact-messages.index') }}" class="btn btn-sm btn-outline-primary">
                                        View All
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                @if($recentMessages->count() > 0)
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Subject</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($recentMessages as $message)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="avatar-sm bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-2">
                                                                {{ substr($message->name, 0, 1) }}
                                                            </div>
                                                            {{ $message->name }}
                                                        </div>
                                                    </td>
                                                    <td>{{ $message->email }}</td>
                                                    <td>{{ $message->subject ?: 'No Subject' }}</td>
                                                    <td>{{ $message->created_at->format('M d, Y H:i') }}</td>
                                                    <td>
                                                        @if($message->is_read)
                                                            <span class="badge bg-success">
                                                                <i class="fas fa-check-circle me-1"></i>Read
                                                            </span>
                                                        @else
                                                            <span class="badge bg-warning">
                                                                <i class="fas fa-envelope me-1"></i>Unread
                                                            </span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.contact-messages.show', $message) }}" class="btn btn-sm btn-outline-primary">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <div class="text-center py-4">
                                        <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                                        <p class="text-muted">No recent messages.</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
@endsection
