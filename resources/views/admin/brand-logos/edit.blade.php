@extends('layouts.admin')

@section('title', 'Edit Brand Logo - VIS GmbH')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
                    <h1>Edit Brand Logo</h1>
                    <div>
                        <a href="{{ route("admin.brand-logos.index") }}" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left me-1"></i>Back to Brand Logos
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
                        <form action="{{ route('admin.brand-logos.update', $brandLogo) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method("PUT")
                            <div class="mb-3">
                                <label for="name" class="form-label">Name *</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $brandLogo->name) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="logo" class="form-label">Logo</label>
                                @if($brandLogo->logo)
                                    <div class="mb-2">
                                        <img src="{{ asset('assets/img/brand-logos/' . $brandLogo->logo) }}" alt="{{ $brandLogo->name }}" style="max-width: 100px; max-height: 60px;" class="img-thumbnail">
                                        <p class="text-muted small mt-1">Current logo</p>
                                    </div>
                                @endif
                                <input type="file" class="form-control" id="logo" name="logo" accept="image/*">
                                <div class="form-text">Upload a new logo file to replace the current one (JPG, PNG, WebP, SVG, etc.)</div>
                            </div>
                            <div class="mb-3">
                                <label for="website_url" class="form-label">Website Url</label>
                                <input type="url" class="form-control" id="website_url" name="website_url" value="{{ old('website_url', $brandLogo->website_url) }}">
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $brandLogo->is_active) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">
                                        Is Active
                                    </label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="sort_order" class="form-label">Sort Order</label>
                                <input type="number" class="form-control" id="sort_order" name="sort_order" value="{{ old('sort_order', $brandLogo->sort_order) }}">
                            </div>

                            <div class="d-flex justify-content-end">
                                <a href="{{ route("admin.brand-logos.index") }}" class="btn btn-secondary me-2">Cancel</a>
                                <button type="submit" class="btn btn-primary">Update Brand Logo</button>
                            </div>
                        </form>
                    </div>
                </div>
@endsection
