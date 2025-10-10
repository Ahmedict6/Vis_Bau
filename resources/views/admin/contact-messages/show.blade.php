@extends('layouts.admin')

@section('title', 'View Message - VIS GmbH')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
                    <h1>View Message</h1>
                    <div>
                        <a href="{{ route('admin.contact-messages.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left me-1"></i>Back to Messages
                        </a>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Message Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <strong>Name:</strong> {{ $contactMessage->name }}
                            </div>
                            <div class="col-md-6">
                                <strong>Email:</strong> {{ $contactMessage->email }}
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <strong>Phone:</strong> {{ $contactMessage->phone ?: 'Not provided' }}
                            </div>
                            <div class="col-md-6">
                                <strong>Subject:</strong> {{ $contactMessage->subject ?: 'No subject' }}
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <strong>Date:</strong> {{ $contactMessage->created_at->format('M d, Y H:i') }}
                            </div>
                            <div class="col-md-6">
                                <strong>Status:</strong>
                                @if($contactMessage->is_read)
                                    <span class="badge bg-success">
                                        <i class="fas fa-check-circle me-1"></i>Read
                                    </span>
                                @else
                                    <span class="badge bg-warning">
                                        <i class="fas fa-envelope me-1"></i>Unread
                                    </span>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="mt-3">
                            <strong>Message:</strong>
                            <div class="mt-2 p-3 bg-light rounded">
                                {{ $contactMessage->message }}
                            </div>
                        </div>
                    </div>
                </div>
@endsection
