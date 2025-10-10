@extends('layouts.admin')

@section('title', 'View Team Member - VIS GmbH')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
                    <h1>View Team Member</h1>
                    <div>
                        <a href="{{ route("admin.team-members.index") }}" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left me-1"></i>Back to Team Members
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
                                <strong>Name:</strong> {{ $teamMember->name ?: 'N/A' }}
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <strong>Position:</strong> {{ $teamMember->position ?: 'N/A' }}
                            </div>
                        </div>
                        <hr>
                        <div class="mt-3">
                            <strong>Bio:</strong>
                            <div class="mt-2 p-3 bg-light rounded">
                                {{ $teamMember->bio ?: 'N/A' }}
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <strong>Image:</strong> {{ $teamMember->image ?: 'N/A' }}
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <strong>Email:</strong> {{ $teamMember->email ?: 'N/A' }}
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <strong>Phone:</strong> {{ $teamMember->phone ?: 'N/A' }}
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <strong>Is Active:</strong>
                                @if($teamMember->is_active)
                                    <span class="badge bg-success">Yes</span>
                                @else
                                    <span class="badge bg-secondary">No</span>
                                @endif
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <strong>Sort Order:</strong> {{ $teamMember->sort_order ?: 'N/A' }}
                            </div>
                        </div>
                    </div>
                </div>
@endsection
