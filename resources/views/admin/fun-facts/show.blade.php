@extends('layouts.admin')

@section('title', 'View Fun Fact - VIS GmbH')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
                    <h1>View Fun Fact</h1>
                    <div>
                        <a href="{{ route("admin.fun-facts.index") }}" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left me-1"></i>Back to Facts
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

                        <div class="row">
                            <div class="col-md-6">
                                <strong>Title:</strong> {{ $funFact->title }}
                            </div>
                            <div class="col-md-6">
                                <strong>Number:</strong> <strong>{{ number_format($funFact->number) }}</strong>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <strong>Icon:</strong> {{ $funFact->icon ?: 'N/A' }}
                            </div>
                            <div class="col-md-6">
                                <strong>Status:</strong>
                                @if($funFact->is_active)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-secondary">Inactive</span>
                                @endif
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <strong>Sort Order:</strong> {{ $funFact->sort_order }}
                            </div>
                            <div class="col-md-6">
                                <strong>Created:</strong> {{ $funFact->created_at->format('M d, Y H:i') }}
                            </div>
                        </div>
                    </div>
                </div>
@endsection
