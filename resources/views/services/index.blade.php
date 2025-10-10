@extends('layouts.app')

@section('title', 'Our Services - VIS GmbH')
@section('meta_description', 'Discover our comprehensive construction services and solutions.')

@section('content')
<div class="page-title-area bg-img" data-bg="{{ asset('assets/img/backgrounds/about.webp') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-title-content text-center">
                    <h2 class="title">Our Services</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Services</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="service-grid-area section-space--inner--120">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-area text-center">
                    <h2 class="section-title section-space--bottom--50">Our Services <span class="title-icon"></span></h2>
                    <p class="section-subtitle">Professional construction services tailored to your needs</p>
                </div>
            </div>
        </div>

        <!-- Search Section -->
        <div class="row mb-4">
            <div class="col-lg-12">
                <form method="GET" action="{{ route('services.index') }}" class="search-form d-flex justify-content-center">
                    <div class="search-input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search services..." value="{{ request('search') }}" style="width: 300px;">
                    </div>
                    <button type="submit" class="btn btn-primary ms-2">Search</button>
                    @if(request('search'))
                        <a href="{{ route('services.index') }}" class="btn btn-outline-secondary ms-2">Clear</a>
                    @endif
                </form>
            </div>
        </div>

        @if($services->count() > 0)
        <div class="row">
            @foreach($services as $service)
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="service-grid-item">
                    <div class="service-grid-item__image">
                        <div class="service-grid-item__image-wrapper">
                            <a href="{{ route('services.show', $service) }}">
                                @if($service->image)
                                <img width="370" height="237" src="{{ asset('assets/img/services/' . $service->image) }}" class="img-fluid" alt="{{ $service->title }}">
                                @else
                                <img width="370" height="237" src="{{ asset('assets/img/service/service1.webp') }}" class="img-fluid" alt="{{ $service->title }}">
                                @endif
                            </a>
                        </div>
                        @if($service->icon)
                        <div class="icon">
                            <i class="{{ $service->icon }}"></i>
                        </div>
                        @endif
                    </div>
                    <div class="service-grid-item__content">
                        <h3 class="title">
                            <a href="{{ route('services.show', $service) }}">{{ $service->title }}</a>
                        </h3>
                        <p class="subtitle">{{ Str::limit($service->description, 100) }}</p>
                        @if($service->price)
                        <p class="price"><strong>Starting from:</strong> ${{ number_format($service->price) }}</p>
                        @endif
                        <a href="{{ route('services.show', $service) }}" class="see-more-link">LEARN MORE</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="pagination-wrapper text-center">
                    {{ $services->links() }}
                </div>
            </div>
        </div>
        @else
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <h3>No Services Available</h3>
                    <p>We are currently updating our service offerings. Please check back soon!</p>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
