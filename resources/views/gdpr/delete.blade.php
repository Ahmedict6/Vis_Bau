@extends('layouts.app')

@section('title', 'Request Data Deletion - VIS GmbH')
@section('meta_description', 'Request the deletion of your personal data under GDPR.')

@section('content')
<div class="page-title-area bg-img" data-bg="{{ asset('assets/img/backgrounds/about.webp') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-title-content text-center">
                    <h2 class="title">Request Data Deletion</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('gdpr.index') }}">GDPR Rights</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data Deletion</li>
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
                        <div class="alert alert-warning">
                            <h5><i class="fas fa-exclamation-triangle"></i> Important Notice</h5>
                            <p class="mb-0">
                                This action will permanently delete all personal data associated with your email address from our systems. This includes contact form submissions and any other personal information we may hold. This action cannot be undone.
                            </p>
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

                        <form method="POST" action="{{ route('gdpr.delete') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address *</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                                <div class="form-text">Enter the email address associated with your account</div>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password *</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                                <div class="form-text">Enter your account password to confirm your identity</div>
                            </div>

                            <div class="mb-3">
                                <label for="confirmation" class="form-label">Confirmation *</label>
                                <input type="text" class="form-control" id="confirmation" name="confirmation" placeholder="Type: I understand that this action cannot be undone" required>
                                <div class="form-text">Please type the confirmation text exactly as shown above</div>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('gdpr.index') }}" class="btn btn-secondary">Cancel</a>
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete all your personal data? This action cannot be undone.')">Delete My Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
