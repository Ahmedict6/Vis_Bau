@extends('layouts.app')

@section('title', $service->title . ' - VIS GmbH')
@section('meta_description', $service->description)

@section('content')
<div class="page-title-area bg-img" data-bg="{{ asset('assets/img/backgrounds/about.webp') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-title-content text-center">
                    <h2 class="title">{{ $service->title }}</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('services.index') }}">Services</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $service->title }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="service-details-area section-space--inner--120">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="service-details-content">
                    @if($service->image)
                    <div class="service-details-image">
                        <img src="{{ asset('assets/img/services/' . $service->image) }}" alt="{{ $service->title }}" class="img-fluid">
                    </div>
                    @endif

                    <div class="service-details-text">
                        <h3>Service Overview</h3>
                        <p>{{ $service->description }}</p>

                        @if($service->content)
                        <div class="service-content">
                            {!! nl2br(e($service->content)) !!}
                        </div>
                        @endif

                        @if($service->features && is_array($service->features))
                        <div class="service-features">
                            <h4>Key Features</h4>
                            <ul class="feature-list">
                                @foreach($service->features as $feature)
                                <li>{{ $feature }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="service-details-sidebar">
                    <div class="sidebar-widget">
                        <h4 class="widget-title">Service Information</h4>
                        <div class="service-info">
                            @if($service->price)
                            <div class="info-item">
                                <strong>Starting Price:</strong>
                                <span>${{ number_format($service->price) }}</span>
                            </div>
                            @endif

                            <div class="info-item">
                                <strong>Service Type:</strong>
                                <span>{{ $service->title }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="sidebar-widget">
                        <h4 class="widget-title">Get a Quote</h4>
                        <p>Interested in this service? Contact us for a personalized quote.</p>
                        <a href="{{ route('contact') }}" class="btn btn-primary">Contact Us</a>
                    </div>

                    @if($relatedServices->count() > 0)
                    <div class="sidebar-widget">
                        <h4 class="widget-title">Related Services</h4>
                        <div class="related-services">
                            @foreach($relatedServices as $relatedService)
                            <div class="related-service-item">
                                <a href="{{ route('services.show', $relatedService) }}">
                                    @if($relatedService->image)
                                    <img src="{{ asset('assets/img/services/' . $relatedService->image) }}" alt="{{ $relatedService->title }}" width="80" height="60">
                                    @else
                                    <img src="{{ asset('assets/img/service/service1.webp') }}" alt="{{ $relatedService->title }}" width="80" height="60">
                                    @endif
                                    <h6>{{ $relatedService->title }}</h6>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

