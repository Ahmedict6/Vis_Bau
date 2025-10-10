@extends('layouts.admin')

@section('title', 'Contact Messages - VIS GmbH')
@section('page-title', 'Contact Messages')
@section('page-subtitle', 'Manage and respond to customer inquiries')

@section('header-actions')
    <a href="{{ route('home') }}" class="btn btn-outline-primary" target="_blank">
        <i class="fas fa-external-link-alt me-1"></i>View Website
    </a>
@endsection

@section('content')

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <div class="card">
                    <div class="card-body">
                        @if($messages->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Subject</th>
                                            <th>Message</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($messages as $message)
                                        <tr>
                                            <td>{{ $message->name }}</td>
                                            <td>{{ $message->email }}</td>
                                            <td>{{ $message->subject ?: 'No Subject' }}</td>
                                            <td>{{ Str::limit($message->message, 50) }}</td>
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
                                                <form action="{{ route('admin.contact-messages.destroy', $message) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this message?')">
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
                                {{ $messages->links() }}
                            </div>
                        @else
                            <p class="text-muted text-center py-4">No contact messages found.</p>
                        @endif
                    </div>
                </div>
@endsection
