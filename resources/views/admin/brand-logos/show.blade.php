@extends('layouts.admin')

@section('title', 'View Brand Logo - VIS GmbH')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
                    <h1>View Brand Logo</h1>
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

                        <div class="row mt-2">
                            <div class="col-md-6">
                                <strong>Name:</strong> {{ $brandLogo->name ?: 'N/A' }}
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <strong>Logo:</strong>
                                @if($brandLogo->logo)
                                    <div class="mt-2">
                                        <img src="{{ asset('assets/img/brand-logos/' . $brandLogo->logo) }}" alt="{{ $brandLogo->name }}" style="max-width: 150px; max-height: 90px;" class="img-thumbnail">
                                    </div>
                                @else
                                    N/A
                                @endif
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <strong>Website Url:</strong> {{ $brandLogo->website_url ?: 'N/A' }}
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <strong>Is Active:</strong>
                                @if($brandLogo->is_active)
                                    <span class="badge bg-success">Yes</span>
                                @else
                                    <span class="badge bg-secondary">No</span>
                                @endif
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <strong>Sort Order:</strong> {{ $brandLogo->sort_order ?: 'N/A' }}
                            </div>
                        </div>
                    </div>
                </div>
@endsection
