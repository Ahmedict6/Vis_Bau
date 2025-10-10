@extends('layouts.app')

@section('title', $project->title . ' - VIS GmbH')
@section('meta_description', $project->description)

@section('content')
<!--====================  breadcrumb area ====================-->
<div class="breadcrumb-area bg-img" data-bg="{{ asset('assets/img/backgrounds/funfact-bg.webp') }}">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="page-banner text-center">
                    <h1>Project Details</h1>
                    <ul class="page-breadcrumb">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('projects.index') }}">Projects</a></li>
                        <li>{{ $project->title }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--====================  End of breadcrumb area  ====================-->

<div class="page-wrapper section-space--inner--120">
    <!--Projects section start-->
    <div class="project-section">
        <div class="container">
            <div class="row">
                <div class="col-12 section-space--bottom--40">
                    <div class="project-image">
                        <img width="1170" height="439" src="{{ asset('assets/img/projects/' . $project->featured_image) }}" class="img-fluid" alt="{{ $project->title }}">
                    </div>
                </div>

                <div class="col-lg-4 col-12 section-space--bottom--30">
                    <div class="project-information">
                        <h3>Project Information</h3>
                        <ul>
                            @if($project->client)
                            <li><strong>Client:</strong> <a href="#">{{ $project->client }}</a></li>
                            @endif
                            @if($project->location)
                            <li><strong>Location:</strong> {{ $project->location }}</li>
                            @endif
                            @if($project->area)
                            <li><strong>Area(sf):</strong> {{ $project->area }}</li>
                            @endif
                            @if($project->completion_date)
                            <li><strong>Year:</strong> {{ $project->completion_date->format('Y') }}</li>
                            @endif
                            @if($project->budget)
                            <li><strong>Budget:</strong> ${{ number_format($project->budget) }}</li>
                            @endif
                            @if($project->architect)
                            <li><strong>Architect:</strong> {{ $project->architect }}</li>
                            @endif
                            @if($project->project_type)
                            <li><strong>Sector:</strong> <a href="#">{{ $project->project_type }}</a></li>
                            @endif
                        </ul>
                    </div>
                </div>

                <div class="col-lg-8 col-12 section-space--bottom--30 pl-30 pl-sm-15 pl-xs-15">
                    <div class="project-details">
                        <h2>{{ $project->title }}</h2>
                        <p>{{ $project->description }}</p>

                        @if($project->content)
                        <div class="project-content">
                            {!! nl2br(e($project->content)) !!}
                        </div>
                        @endif
                    </div>
                </div>

                @if($project->gallery_images && is_array($project->gallery_images) && count($project->gallery_images) > 0)
                <div class="col-12">
                    <div class="row row-5 image-popup">
                        @foreach($project->gallery_images as $galleryImage)
                        <div class="col-xl-3 col-lg-4 col-sm-6 col-12 section-space--top--10">
                            <a href="{{ asset('assets/img/projects/' . $galleryImage) }}" class="gallery-item single-gallery-thumb">
                                <img width="476" height="476" src="{{ asset('assets/img/projects/' . $galleryImage) }}" class="img-fluid" alt="{{ $project->title }}">
                                <span class="plus"></span>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    <!--Projects section end-->
</div>

<!--====================  brand logo area ====================-->
@if(\App\Models\SectionSetting::isSectionActive('brand_logos'))
<div class="brand-logo-slider-area grey-bg section-space--inner--60">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- brand logo slider -->
                <div class="brand-logo-slider__container-area">
                    <div class="swiper-container brand-logo-slider__container">
                        <div class="swiper-wrapper brand-logo-slider__wrapper">
                            @forelse(\App\Models\BrandLogo::where('is_active', true)->orderBy('sort_order')->get() as $brandLogo)
                            <div class="swiper-slide brand-logo-slider__single">
                                <div class="image">
                                    <a href="{{ $brandLogo->url ?: '#' }}">
                                        <img width="152" height="51" src="{{ asset('assets/img/brand-logos/' . $brandLogo->logo) }}" class="img-fluid" alt="{{ $brandLogo->name }}">
                                    </a>
                                </div>
                            </div>
                            @empty
                            <!-- Default brand logos if no data -->
                            <div class="swiper-slide brand-logo-slider__single">
                                <div class="image">
                                    <a href="#">
                                        <img width="152" height="51" src="{{ asset('assets/img/brand-logos/1.webp') }}" class="img-fluid" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide brand-logo-slider__single">
                                <div class="image">
                                    <a href="#">
                                        <img width="199" height="51" src="{{ asset('assets/img/brand-logos/2.webp') }}" class="img-fluid" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide brand-logo-slider__single">
                                <div class="image">
                                    <a href="#">
                                        <img width="217" height="51" src="{{ asset('assets/img/brand-logos/3.webp') }}" class="img-fluid" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide brand-logo-slider__single">
                                <div class="image">
                                    <a href="#">
                                        <img width="225" height="51" src="{{ asset('assets/img/brand-logos/4.webp') }}" class="img-fluid" alt="">
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
@endif
<!--====================  End of brand logo area  ====================-->
@endsection
