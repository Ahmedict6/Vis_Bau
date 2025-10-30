@extends('layouts.app')

@php
    use App\Models\AboutPageSetting;
    $pageTitle = AboutPageSetting::getValue('page_title', 'About Us - VIS GmbH');
    $metaDesc = AboutPageSetting::getValue('meta_description', 'Learn more about our construction company');
    $breadcrumbTitle = AboutPageSetting::getValue('breadcrumb_title', 'About Us');
@endphp

@section('title', $pageTitle)
@section('meta_description', $metaDesc)

@section('content')
<!--====================  breadcrumb area ====================-->
<div class="breadcrumb-area bg-img" data-bg="{{ AboutPageSetting::getBreadcrumbBackground() }}">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="page-banner text-center">
                    <h1>{{ $breadcrumbTitle }}</h1>
                    <ul class="page-breadcrumb">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>{{ $breadcrumbTitle }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--====================  End of breadcrumb area  ====================-->

<div class="page-wrapper section-space--inner--top--120">
    <!--About section start-->
    @if(AboutPageSetting::getValue('welcome_show', '1') == '1')
    <div class="about-section section-space--inner--bottom--120">
    <div class="container">
            <div class="row row-25 align-items-center">
                <div class="col-lg-6 col-12 mb-30">
                    <div class="about-image-two">
                        <img width="560" height="490" src="{{ AboutPageSetting::getImageUrl('welcome_image', 'assets/img/about/about-3.webp') }}" alt="{{ AboutPageSetting::getValue('welcome_subtitle', 'Welcome to VIS GmbH') }}">
                        @if(AboutPageSetting::getValue('welcome_video_url'))
                        <span class="video-popup">
                            <a href="{{ AboutPageSetting::getValue('welcome_video_url', '#') }}"><i class="ion-ios-play-outline"></i></a>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6 col-12 mb-30">
                    <div class="about-content-two">
                        <h3>{{ AboutPageSetting::getValue('welcome_subtitle', 'Welcome to VIS GmbH') }}</h3>
                        <h1>{{ AboutPageSetting::getValue('welcome_title', '50 Years of Experience in Industry') }}</h1>
                        <h4>{{ AboutPageSetting::getValue('welcome_heading', 'We are ready to build your dream project') }}</h4>
                        <p>{{ AboutPageSetting::getValue('welcome_content', 'At VIS GmbH, we bring together expertise and innovation.') }}</p>
                        <a href="{{ route('services.index') }}" class="ht-btn--default ht-btn--default--dark-hover section-space--top--20">Our Services</a>
            </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <!--About section end-->

    <!--Feature section start-->
    @if(AboutPageSetting::getValue('features_show', '1') == '1')
    <div class="feature-section section-space--inner--100 grey-bg">
    <div class="container">
            <div class="col-lg-12">
                <div class="feature-item-wrapper">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-12 section-space--bottom--30">
                            <div class="feature">
                                <div class="icon">
                                    <img width="49" height="48" src="{{ AboutPageSetting::getImageUrl('feature_1_icon', 'assets/img/icons/feature-1.webp') }}" class="img-fluid" alt="{{ AboutPageSetting::getValue('feature_1_title', 'Top Rated') }}">
                                </div>
                                <div class="content">
                                    <h3>{{ AboutPageSetting::getValue('feature_1_title', 'Top Rated') }}</h3>
                                    <p>{{ AboutPageSetting::getValue('feature_1_content', 'Quality service and expertise.') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12 section-space--bottom--30">
                            <div class="feature">
                                <div class="icon">
                                    <img width="50" height="50" src="{{ AboutPageSetting::getImageUrl('feature_2_icon', 'assets/img/icons/feature-2.webp') }}" class="img-fluid" alt="{{ AboutPageSetting::getValue('feature_2_title', 'Best Quality') }}">
                                </div>
                                <div class="content">
                                    <h3>{{ AboutPageSetting::getValue('feature_2_title', 'Best Quality') }}</h3>
                                    <p>{{ AboutPageSetting::getValue('feature_2_content', 'Premium materials and skilled craftsmen.') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12 section-space--bottom--30">
                            <div class="feature">
                                <div class="icon">
                                    <img width="47" height="47" src="{{ AboutPageSetting::getImageUrl('feature_3_icon', 'assets/img/icons/feature-3.webp') }}" class="img-fluid" alt="{{ AboutPageSetting::getValue('feature_3_title', 'Competitive Pricing') }}">
                                </div>
                                <div class="content">
                                    <h3>{{ AboutPageSetting::getValue('feature_3_title', 'Competitive Pricing') }}</h3>
                                    <p>{{ AboutPageSetting::getValue('feature_3_content', 'Best value for your investment.') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <!--Feature section end-->

    <!--About section start-->
    @if(AboutPageSetting::getValue('experience_show', '1') == '1')
    <div class="about-section section-space--inner--120">
        <div class="container">
            <div class="about-wrapper row">
                <div class="col-sm-6 col-12 order-1 order-lg-2">
                    <div class="about-image about-image-1">
                        <img width="585" height="456" src="{{ AboutPageSetting::getImageUrl('experience_image_1', 'assets/img/about/about-1.webp') }}" alt="Experience">
                    </div>
                </div>
                <div class="col-sm-6 col-12 order-2 order-lg-3">
                    <div class="about-image about-image-2">
                        <img width="585" height="456" src="{{ AboutPageSetting::getImageUrl('experience_image_2', 'assets/img/about/about-2.webp') }}" alt="Experience">
                    </div>
                </div>
                <div class="col-lg-6 col-12 order-3 order-lg-1">
                    <div class="about-content about-content-1">
                        <h1><span>{{ AboutPageSetting::getValue('experience_years', '50') }}</span>{{ AboutPageSetting::getValue('experience_title', 'Years of Experience') }}</h1>
                        <p>{{ AboutPageSetting::getValue('experience_content_1', 'Our extensive experience in the construction industry.') }}</p>
                    </div>
                </div>
                <div class="col-lg-6 col-12 order-4">
                    <div class="about-content about-content-2">
                        <p>{{ AboutPageSetting::getValue('experience_content_2', 'We deliver outstanding results with modern techniques.') }}</p>
                        <a href="{{ route('contact') }}" class="ht-btn--default ht-btn--default--dark-hover section-space--top--20">Contact us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <!--About section end-->

    <!--====================  fun fact area ====================-->
    @if(AboutPageSetting::getValue('funfacts_show', '1') == '1')
    <div class="funfact-section section-space--inner--100 bg-img" data-bg="{{ asset('assets/img/backgrounds/funfact-bg.webp') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="fun-fact-wrapper">
                        <div class="row">
                            @php
                                $funFacts = \App\Models\FunFact::where('is_active', true)->orderBy('sort_order')->get();
                            @endphp
                            @forelse($funFacts as $fact)
                            <div class="single-fact col-md-3 col-6 section-space--bottom--30">
                                @if($fact->icon)
                                <img width="60" height="60" src="{{ asset('assets/img/fun-facts/' . $fact->icon) }}" alt="">
                                @endif
                                <h1 class="counter">{{ $fact->number }}</h1>
                                <h4>{{ $fact->title }}</h4>
                            </div>
                            @empty
                            <div class="single-fact col-md-3 col-6 section-space--bottom--30">
                                <img width="60" height="60" src="{{ asset('assets/img/icons/funfact-project.webp') }}" alt="Projects">
                                <h1 class="counter">150</h1>
                                <h4>Projects</h4>
                            </div>
                            <div class="single-fact col-md-3 col-6 section-space--bottom--30">
                                <img width="43" height="60" src="{{ asset('assets/img/icons/funfact-clients.webp') }}" alt="Clients">
                                <h1 class="counter">95</h1>
                                <h4>Happy Clients</h4>
                            </div>
                            <div class="single-fact col-md-3 col-6 section-space--bottom--30">
                                <img width="32" height="60" src="{{ asset('assets/img/icons/funfact-success.webp') }}" alt="Success">
                                <h1 class="counter">98</h1>
                                <h4>Success Rate %</h4>
                            </div>
                            <div class="single-fact col-md-3 col-6 section-space--bottom--30">
                                <img width="46" height="60" src="{{ asset('assets/img/icons/funfact-award.webp') }}" alt="Awards">
                                <h1 class="counter">25</h1>
                                <h4>Years Experience</h4>
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <!--====================  End of fun fact area  ====================-->

    <!--====================  team member area ====================-->
    @if(AboutPageSetting::getValue('team_show', '1') == '1')
    <div class="team-member-area section-space--inner--120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area text-center">
                        <h2 class="section-title section-space--bottom--50">Our Team <span class="title-icon"></span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="team-member-wrapper">
                        <div class="row">
                            @php
                                $teamMembers = \App\Models\TeamMember::where('is_active', true)->take(4)->get();
                            @endphp
                            @forelse($teamMembers as $member)
                            <div class="col-lg-3 col-sm-6 col-12 section-space--bottom--30">
                                <div class="team">
                                    <div class="image">
                                        <img class="img-fluid" width="370" height="370" src="{{ asset('storage/' . $member->image) }}" alt="{{ $member->name }}">
                                    </div>
                                    <div class="content">
                                        <h3 class="title">{{ $member->name }}</h3>
                                        <span>{{ $member->position }}</span>
                                        <a href="mailto:{{ $member->email }}" class="email">{{ $member->email }}</a>
                                        <div class="social">
                                            @if($member->facebook)
                                            <a href="{{ $member->facebook }}" class="facebook"><i class="fa fa-facebook"></i></a>
                                            @endif
                                            @if($member->twitter)
                                            <a href="{{ $member->twitter }}" class="twitter"><i class="fa fa-twitter"></i></a>
                                            @endif
                                            @if($member->linkedin)
                                            <a href="{{ $member->linkedin }}" class="linkedin"><i class="fa fa-linkedin"></i></a>
                                            @endif
                                            @if($member->instagram)
                                            <a href="{{ $member->instagram }}" class="google"><i class="fa fa-instagram"></i></a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <!-- Default team members if no data -->
                            <div class="col-lg-3 col-sm-6 col-12 section-space--bottom--30">
                                <div class="team">
                                    <div class="image">
                                        <img class="img-fluid" width="370" height="370" src="{{ asset('assets/img/team/team-1.webp') }}" alt="">
                                    </div>
                                    <div class="content">
                                        <h3 class="title">Jonathan Scott</h3>
                                        <span>CEO & Architech</span>
                                        <a href="#" class="email">info@example.com</a>
                                        <div class="social">
                                            <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                                            <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                                            <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                                            <a href="#" class="google"><i class="fa fa-google-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12 section-space--bottom--30">
                                <div class="team">
                                    <div class="image">
                                        <img class="img-fluid" width="370" height="370" src="{{ asset('assets/img/team/team-2.webp') }}" alt="">
                                    </div>
                                    <div class="content">
                                        <h3 class="title">Benjamin Austin</h3>
                                        <span>Chief Engineer</span>
                                        <a href="#" class="email">info@example.com</a>
                                        <div class="social">
                                            <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                                            <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                                            <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                                            <a href="#" class="google"><i class="fa fa-google-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12 section-space--bottom--30">
                                <div class="team">
                                    <div class="image">
                                        <img class="img-fluid" width="370" height="370" src="{{ asset('assets/img/team/team-3.webp') }}" alt="">
                                    </div>
                                    <div class="content">
                                        <h3 class="title">John Oliver</h3>
                                        <span>Project Manager</span>
                                        <a href="#" class="email">info@example.com</a>
                                        <div class="social">
                                            <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                                            <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                                            <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                                            <a href="#" class="google"><i class="fa fa-google-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12 section-space--bottom--30">
                                <div class="team">
                                    <div class="image">
                                        <img class="img-fluid" width="370" height="370" src="{{ asset('assets/img/team/team-4.webp') }}" alt="">
                                    </div>
                                    <div class="content">
                                        <h3 class="title">Philip Alvarez</h3>
                                        <span>Finanaces</span>
                                        <a href="#" class="email">info@example.com</a>
                                        <div class="social">
                                            <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                                            <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                                            <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                                            <a href="#" class="google"><i class="fa fa-google-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <!--====================  End of team member area  ====================-->

    <!--====================  testimonial slider area ====================-->
    @if(AboutPageSetting::getValue('testimonials_show', '1') == '1')
    <div class="testimonial-slider-area testimonial-slider-area-bg section-space--inner--120 bg-img" data-bg="{{ asset('assets/img/backgrounds/testimonial.webp') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="testimonial-slider">
                        <div class="testimonial-slider__container-area">
                            <div class="swiper-container testimonial-slider__container">
                                <div class="swiper-wrapper testimonial-slider__wrapper">
                                    @php
                                        $testimonials = \App\Models\Testimonial::where('is_active', true)->take(3)->get();
                                    @endphp
                                    @forelse($testimonials as $testimonial)
                                    <div class="swiper-slide testimonial-slider__single-slide">
                                        <div class="author">
                                            <div class="author__image">
                                                <img width="100" height="100" src="{{ asset('storage/' . $testimonial->image) }}" alt="{{ $testimonial->name }}">
                                            </div>
                                            <div class="author__details">
                                                <h4 class="name">{{ $testimonial->name }}</h4>
                                                <div class="designation">{{ $testimonial->position }}</div>
                                            </div>
                                        </div>
                                        <div class="content">
                                            {{ $testimonial->content }}
                                        </div>
                                    </div>
                                    @empty
                                    <!-- Default testimonials if no data -->
                                    <div class="swiper-slide testimonial-slider__single-slide">
                                        <div class="author">
                                            <div class="author__image">
                                                <img width="100" height="100" src="{{ asset('assets/img/testimonial/1.webp') }}" alt="">
                                            </div>
                                            <div class="author__details">
                                                <h4 class="name">Madison Black</h4>
                                                <div class="designation">Founder</div>
                                            </div>
                                        </div>
                                        <div class="content">
                                            Lorem ipsum dolor sit amet, consectetur adipisi elit sed do eiusmod tempor incididu ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                        </div>
                                    </div>
                                    <div class="swiper-slide testimonial-slider__single-slide">
                                        <div class="author">
                                            <div class="author__image">
                                                <img width="100" height="100" src="{{ asset('assets/img/testimonial/2.webp') }}" alt="">
                                            </div>
                                            <div class="author__details">
                                                <h4 class="name">John Doe</h4>
                                                <div class="designation">Founder</div>
                                            </div>
                                        </div>
                                        <div class="content">
                                            do eiusmod tempor incididu ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                        </div>
                                    </div>
                                    <div class="swiper-slide testimonial-slider__single-slide">
                                        <div class="author">
                                            <div class="author__image">
                                                <img width="100" height="100" src="{{ asset('assets/img/testimonial/3.webp') }}" alt="">
                                            </div>
                                            <div class="author__details">
                                                <h4 class="name">Jonathon Doe</h4>
                                                <div class="designation">Founder</div>
                                            </div>
                                        </div>
                                        <div class="content">
                                            consectetur adipisi elit sed do eiusmod tempor incididu ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                        </div>
                                    </div>
                                    @endforelse
                                </div>
                            </div>
                            <div class="swiper-pagination swiper-pagination-3"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <!--====================  End of testimonial slider area  ====================-->

    <!--====================  brand logo area ====================-->
    @if(AboutPageSetting::getValue('brand_logos_show', '1') == '1' && \App\Models\SectionSetting::isSectionActive('brand_logos'))
    <div class="brand-logo-slider-area section-space--inner--60">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- brand logo slider -->
                    <div class="brand-logo-slider__container-area">
                        <div class="swiper-container brand-logo-slider__container">
                            <div class="swiper-wrapper brand-logo-slider__wrapper">
                                @php
                                    $brandLogos = \App\Models\BrandLogo::where('is_active', true)->orderBy('sort_order')->get();
                                @endphp
                                @forelse($brandLogos as $logo)
                                <div class="swiper-slide brand-logo-slider__single">
                                    <div class="image">
                                        <a href="{{ $logo->website_url ?? '#' }}">
                                            <img width="152" height="51" src="{{ asset('assets/img/brand-logos/' . $logo->logo) }}" class="img-fluid" alt="{{ $logo->name }}">
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
</div>
@endsection
