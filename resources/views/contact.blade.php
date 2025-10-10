@extends('layouts.app')

@section('title', 'Contact Us - VIS GmbH')
@section('meta_description', 'Get in touch with us for your construction needs. Contact VIS GmbH for innovative and reliable building projects.')

@section('content')
<!--====================  breadcrumb area ====================-->
<div class="breadcrumb-area bg-img" data-bg="{{ \App\Models\AboutPageSetting::getBreadcrumbBackground() }}">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="page-banner text-center">
                    <h1>Contact Us</h1>
                    <ul class="page-breadcrumb">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>Contact Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--====================  End of breadcrumb area  ====================-->

<div class="page-wrapper section-space--inner--120">
    <!--Contact section start-->
    <div class="conact-section">
        <div class="container">
            <div class="row section-space--bottom--50">
                <div class="col">
                    <div class="contact-map" style="height: 400px; width: 100%; background-color: #f8f9fa; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                        <div class="text-center">
                            <i class="fas fa-map-marker-alt fa-3x text-muted mb-3"></i>
                            <h4 class="text-muted">Find Us</h4>
                            <p class="text-muted">Rosengartenplatz 3, 68161 Mannheim, Germany</p>
                            <a href="https://maps.google.com/maps?q=Rosengartenplatz+3,+68161+Mannheim,+Germany" target="_blank" class="btn btn-primary">
                                <i class="fas fa-directions"></i> Get Directions
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-12">
                        <div class="contact-information">
                            <h3>Contact Information</h3>
                            <ul>
                                <li>
                                    <span class="icon"><i class="ion-android-map"></i></span>
                                    <span class="text"><span>Rosengartenplatz 3, 68161 Mannheim, Germany</span></span>
                                </li>
                                <li>
                                    <span class="icon"><i class="ion-ios-telephone-outline"></i></span>
                                    <span class="text"><a href="tel:+496216374820">+49 (0) 621 6374820</a></span>
                                </li>
                                <li>
                                    <span class="icon"><i class="ion-ios-email-outline"></i></span>
                                    <span class="text"><a href="mailto:info@vis-bau.com">info@vis-bau.com</a></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-8 col-12">
                        <div class="contact-form">
                            <h3>Leave Your Message</h3>
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <form id="contact-form" action="{{ route('contact.store') }}" method="post">
                                @csrf
                                <div class="row row-10">
                                    <div class="col-md-6 col-12 section-space--bottom--20">
                                        <input name="name" type="text" placeholder="Your Name" value="{{ old('name') }}" required>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 col-12 section-space--bottom--20">
                                        <input name="email" type="email" placeholder="Your Email" value="{{ old('email') }}" required>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <textarea name="message" placeholder="Your Message" required>{{ old('message') }}</textarea>
                                        @error('message')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <button type="submit">Send Message</button>
                                    </div>
                                </div>
                            </form>
                            <p class="form-message"></p>
                        </div>
                    </div>
        </div>
        <!--Contact section end-->
    </div>
</div>
<!--====================  brand logo area ====================-->
@isset($brandLogos)
<div class="brand-logo-slider-area grey-bg section-space--inner--60">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- brand logo slider -->
                <div class="brand-logo-slider__container-area">
                    <div class="swiper-container brand-logo-slider__container">
                        <div class="swiper-wrapper brand-logo-slider__wrapper">
                            @forelse($brandLogos as $logo)
                            <div class="swiper-slide brand-logo-slider__single">
                                <div class="image">
                                    <a href="{{ $logo->website_url ?: '#' }}" target="_blank">
                                        <img width="152" height="51" src="{{ asset('assets/img/brand-logos/' . $logo->logo) }}" class="img-fluid" alt="{{ $logo->name }}">
                                    </a>
                                </div>
                            </div>
                            @empty
                            <div class="swiper-slide brand-logo-slider__single">
                                <div class="image">
                                    <a href="#">
                                        <img width="152" height="51" src="{{ asset('assets/img/brand-logos/1.webp') }}" class="img-fluid" alt="Brand 1">
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide brand-logo-slider__single">
                                <div class="image">
                                    <a href="#">
                                        <img width="199" height="51" src="{{ asset('assets/img/brand-logos/2.webp') }}" class="img-fluid" alt="Brand 2">
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide brand-logo-slider__single">
                                <div class="image">
                                    <a href="#">
                                        <img width="217" height="51" src="{{ asset('assets/img/brand-logos/3.webp') }}" class="img-fluid" alt="Brand 3">
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide brand-logo-slider__single">
                                <div class="image">
                                    <a href="#">
                                        <img width="225" height="51" src="{{ asset('assets/img/brand-logos/4.webp') }}" class="img-fluid" alt="Brand 4">
                                    </a>
                                </div>
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endisset
<!--====================  End of brand logo area  ====================-->
@endsection

@push('styles')
<style>
    .contact-map {
        height: 400px !important;
        width: 100% !important;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .contact-map:empty::before {
        content: "Loading map...";
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
        background-color: #f8f9fa;
        color: #6c757d;
        font-size: 16px;
    }

    /* Fix empty space at bottom */
    .page-wrapper {
        margin-bottom: 0 !important;
        padding-bottom: 0 !important;
    }

    .conact-section {
        margin-bottom: 0 !important;
        padding-bottom: 0 !important;
    }

    .brand-logo-slider-area {
        margin-bottom: 0 !important;
    }
</style>
@endpush

@push('scripts')
<!-- Override the main.js map initialization -->
<script>
    // Override the main.js map function to use our coordinates
    $(document).ready(function() {
        // Wait for main.js to load, then override its map function
        setTimeout(function() {
            if (typeof google !== 'undefined' && google.maps && $(".contact-map").length) {
                // Override the initialize function from main.js
                window.initialize = function() {
                    var mapOptions = {
                        zoom: 15,
                        scrollwheel: false,
                        center: new google.maps.LatLng(49.4875, 8.4660) // Mannheim, Germany
                    };
                    var map = new google.maps.Map(
                        document.getElementById("contact-map"),
                        mapOptions
                    );
                    var marker = new google.maps.Marker({
                        position: map.getCenter(),
                        map: map,
                        title: "VIS GmbH - Rosengartenplatz 3, 68161 Mannheim, Germany"
                    });

                    // Add info window
                    var infoWindow = new google.maps.InfoWindow({
                        content: '<div style="padding: 10px;"><h4>VIS GmbH</h4><p>Rosengartenplatz 3<br>68161 Mannheim, Germany</p><p>Phone: +49 (0) 621 6374820</p><p>Email: info@vis-bau.com</p></div>'
                    });

                    marker.addListener("click", function() {
                        infoWindow.open(map, marker);
                    });
                };

                // Re-initialize the map with our settings
                if (typeof google.maps.event !== 'undefined') {
                    google.maps.event.addDomListener(window, "load", window.initialize);
                }
            }
        }, 1000);
    });
</script>
@endpush
