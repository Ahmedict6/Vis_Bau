@extends('layouts.app')

@section('title', 'Our Projects - VIS GmbH')
@section('meta_description', 'View our portfolio of construction projects and see our expertise in action.')

@section('content')
<!--====================  breadcrumb area ====================-->
<div class="breadcrumb-area bg-img" data-bg="{{ asset('assets/img/backgrounds/funfact-bg.webp') }}">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="page-banner text-center">
                    <h1>Projects</h1>
                    <ul class="page-breadcrumb">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>Projects</li>
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
                <div class="col-lg-12">
                    <div class="project-item-wrapper">
                        <div class="row">
                            @if($projects->count() > 0)
                                @foreach($projects as $project)
                                <div class="col-lg-4 col-sm-6 col-12 section-space--bottom--30">
                                    <div class="service-grid-item service-grid-item--style2">
                                        <div class="service-grid-item__image">
                                            <div class="service-grid-item__image-wrapper">
                                                <a href="{{ route('projects.show', $project) }}">
                                                    <img width="370" height="237" src="{{ asset('assets/img/projects/' . $project->featured_image) }}" class="img-fluid" alt="{{ $project->title }}">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="service-grid-item__content">
                                            <h3 class="title">
                                                <a href="{{ route('projects.show', $project) }}">{{ $project->title }}</a>
                                            </h3>
                                            <p class="subtitle">{{ Str::limit($project->description, 100) }}</p>
                                            <a href="{{ route('projects.show', $project) }}" class="see-more-link">SEE MORE</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @else
                                <div class="col-lg-12">
                                    <div class="text-center">
                                        <h3>No Projects Available</h3>
                                        <p>We are currently working on updating our project portfolio. Please check back soon!</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            @if($projects->count() > 0)
            <div class="row section-space--top--60">
                <div class="col">
                    <div class="pagination-wrapper text-center">
                        {{ $projects->links() }}
                    </div>
                </div>
            </div>
            @endif
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
