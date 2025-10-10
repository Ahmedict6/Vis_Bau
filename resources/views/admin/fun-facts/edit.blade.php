@extends('layouts.admin')

@section('title', 'Edit Fun Fact - VIS GmbH')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
                    <h1>Edit Fun Fact</h1>
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
                        <form action="{{ route('admin.fun-facts.update', $funFact) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method("PUT")
                            <div class="mb-3">
                                <label for="title" class="form-label">Title *</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $funFact->title) }}" required>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="number" class="form-label">Number *</label>
                                        <input type="number" class="form-control" id="number" name="number" value="{{ old('number', $funFact->number) }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="icon" class="form-label">Icon</label>
                                        <input type="file" class="form-control" id="icon" name="icon" accept="image/*">
                                        <div class="form-text">Upload an icon file (JPG, PNG, WebP, SVG, etc.)</div>
                                        @if($funFact->icon)
                                            <div class="mt-2">
                                                <p class="mb-1"><strong>Current Icon:</strong></p>
                                                <img src="{{ asset('assets/img/fun-facts/' . $funFact->icon) }}" alt="Current Icon" class="img-thumbnail" style="max-width: 150px; max-height: 150px;">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="sort_order" class="form-label">Sort Order</label>
                                        <input type="number" class="form-control" id="sort_order" name="sort_order" value="{{ old('sort_order', $funFact->sort_order) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <div class="form-check mt-4">
                                            <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $funFact->is_active) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="is_active">
                                                Active
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <a href="{{ route("admin.fun-facts.index") }}" class="btn btn-secondary me-2">Cancel</a>
                                <button type="submit" class="btn btn-primary">Update Fun Fact</button>
                            </div>
                        </form>
                    </div>
                </div>
@endsection
