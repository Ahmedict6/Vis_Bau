@extends('layouts.app')

@section('title', 'GDPR Data Rights - VIS GmbH')
@section('meta_description', 'Manage your personal data and privacy rights under GDPR.')

@section('content')
<div class="page-title-area bg-img" data-bg="{{ asset('assets/img/backgrounds/about.webp') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-title-content text-center">
                    <h2 class="title">GDPR Data Rights</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">GDPR Rights</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-wrapper section-space--inner--120">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title mb-4">Your Data Rights</h3>
                        <p class="card-text mb-4">
                            Under the General Data Protection Regulation (GDPR), you have several rights regarding your personal data. You can request access to your data, ask for corrections, request deletion, or object to processing.
                        </p>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="gdpr-option-card h-100">
                                    <div class="card-body text-center">
                                        <i class="fas fa-download fa-3x text-primary mb-3"></i>
                                        <h5 class="card-title">Export Your Data</h5>
                                        <p class="card-text">Download a copy of all personal data we hold about you in JSON format.</p>
                                        <form method="POST" action="{{ route('gdpr.export') }}" class="mt-3">
                                            @csrf
                                            <div class="mb-3">
                                                <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                                            </div>
                                            <div class="mb-3">
                                                <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Export Data</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-4">
                                <div class="gdpr-option-card h-100">
                                    <div class="card-body text-center">
                                        <i class="fas fa-trash-alt fa-3x text-danger mb-3"></i>
                                        <h5 class="card-title">Request Data Deletion</h5>
                                        <p class="card-text">Request the deletion of all personal data we hold about you.</p>
                                        <a href="{{ route('gdpr.delete.form') }}" class="btn btn-danger mt-3">Request Deletion</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <a href="{{ route('gdpr.privacy') }}" class="btn btn-outline-primary">Read Our Privacy Policy</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.gdpr-option-card {
    border: 1px solid #e9ecef;
    border-radius: 8px;
    transition: box-shadow 0.3s ease;
}

.gdpr-option-card:hover {
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}
</style>
@endsection
