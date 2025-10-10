@extends('layouts.admin')

@section('title', 'View Service - VIS GmbH')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
                    <h1>View Service</h1>
                    <div>
                        <a href="{{ route("admin.services.index") }}" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left me-1"></i>Back to Services
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
                                <strong>Title:</strong> {{ $service->title ?: 'N/A' }}
                            </div>
                        </div>
                        <hr>
                        <div class="mt-3">
                            <strong>Description:</strong>
                            <div class="mt-2 p-3 bg-light rounded">
                                {{ $service->description ?: 'N/A' }}
                            </div>
                        </div>
                        <hr>
                        <div class="mt-3">
                            <strong>Content:</strong>
                            <div class="mt-2 p-3 bg-light rounded">
                                {{ $service->content ?: 'N/A' }}
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <strong>Icon:</strong> {{ $service->icon ?: 'N/A' }}
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <strong>Image:</strong> {{ $service->image ?: 'N/A' }}
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <strong>Price:</strong> {{ $service->price ?: 'N/A' }}
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <strong>Is Published:</strong>
                                @if($service->is_published)
                                    <span class="badge bg-success">Yes</span>
                                @else
                                    <span class="badge bg-secondary">No</span>
                                @endif
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <strong>Sort Order:</strong> {{ $service->sort_order ?: 'N/A' }}
                            </div>
                        </div>
                    </div>
                </div>
@endsection
