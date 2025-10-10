@extends('layouts.app')

@section('title', 'About Us - VIS GmbH')
@section('meta_description', 'Learn more about our construction company and our commitment to innovative and reliable building projects.')

@section('content')
<!--====================  breadcrumb area ====================-->
<div class="breadcrumb-area bg-img" data-bg="{{ asset('assets/img/backgrounds/funfact-bg.webp') }}">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="page-banner text-center">
                    <h1>About Us</h1>
                    <ul class="page-breadcrumb">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>About Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--====================  End of breadcrumb area  ====================-->

<div class="page-wrapper section-space--inner--top--120">
    <!--About section start-->
    <div class="about-section section-space--inner--bottom--120">
    <div class="container">
            <div class="row row-25 align-items-center">
                <div class="col-lg-6 col-12 mb-30">
                    <div class="about-image-two">
                        <img width="560" height="490" src="{{ asset('assets/img/about/about-3.webp') }}" alt="">
                        <span class="video-popup">
                            <a href="https://www.youtube.com/watch?v=LTauBc7lDIg"><i class="ion-ios-play-outline"></i></a>
                        </span>
                    </div>
                </div>
                <div class="col-lg-6 col-12 mb-30">
                    <div class="about-content-two">
                        <h3>Welcome to VIS GmbH</h3>
                        <h1>50 Years of Experience in Industry</h1>
                        <h4>We are ready to build your dream home Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum, beatae.</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam repudiandae odit dolorum quis laudantium impedit beatae perferendis natus, hic libero sed atque quibusdam possimus error, voluptate est molestiae doloremque necessitatibus illum rerum sunt! Ad sunt obcaecati voluptatem sint sequi quos, qui non deleniti a praesentium, sapiente accusantium odit.</p>
                        <a href="{{ route('services.index') }}" class="ht-btn--default ht-btn--default--dark-hover section-space--top--20">Our Services</a>
            </div>
                </div>
            </div>
        </div>
    </div>
    <!--About section end-->

    <!--Feature section start-->
    <div class="feature-section section-space--inner--100 grey-bg">
    <div class="container">
            <div class="col-lg-12">
                <div class="feature-item-wrapper">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-12 section-space--bottom--30">
                            <div class="feature">
                                <div class="icon">
                                    <img width="49" height="48" src="{{ asset('assets/img/icons/feature-1.webp') }}" class="img-fluid" alt="">
                                </div>
                                <div class="content">
                                    <h3>Top Rated</h3>
                                    <p>Lorem ipsum dolor sit amet, consec tetur adipisicing elit. Officia odio eum corporis consequatur.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12 section-space--bottom--30">
                            <div class="feature">
                                <div class="icon">
                                    <img width="50" height="50" src="{{ asset('assets/img/icons/feature-2.webp') }}" class="img-fluid" alt="">
                                </div>
                                <div class="content">
                                    <h3>Best Quality</h3>
                                    <p>Lorem ipsum dolor sit amet, consec tetur adipisicing elit. Officia odio eum corporis consequatur.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12 section-space--bottom--30">
                            <div class="feature">
                                <div class="icon">
                                    <img width="47" height="47" src="{{ asset('assets/img/icons/feature-3.webp') }}" class="img-fluid" alt="">
                                </div>
                                <div class="content">
                                    <h3>Low Cost</h3>
                                    <p>Lorem ipsum dolor sit amet, consec tetur adipisicing elit. Officia odio eum corporis consequatur.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Feature section end-->

    <!--About section start-->
    <div class="about-section section-space--inner--120">
        <div class="container">
            <div class="about-wrapper row">
                <div class="col-sm-6 col-12 order-1 order-lg-2">
                    <div class="about-image about-image-1">
                        <img width="585" height="456" src="{{ asset('assets/img/about/about-1.webp') }}" alt="">
                    </div>
                </div>
                <div class="col-sm-6 col-12 order-2 order-lg-3">
                    <div class="about-image about-image-2">
                        <img width="585" height="456" src="{{ asset('assets/img/about/about-2.webp') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-12 order-3 order-lg-1">
                    <div class="about-content about-content-1">
                        <h1><span>50</span>Years of Experience</h1>
                        <p>ligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor ellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum atibus saepe eveniet ut et voluptates repudiandae sint et molestiae</p>
                    </div>
                </div>
                <div class="col-lg-6 col-12 order-4">
                    <div class="about-content about-content-2">
                        <p>ligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor ellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum atibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapie</p>
                        <a href="{{ route('contact') }}" class="ht-btn--default ht-btn--default--dark-hover section-space--top--20">Contact us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--About section end-->

    <!--====================  fun fact area ====================-->
    <div class="funfact-section section-space--inner--100 bg-img" data-bg="{{ asset('assets/img/backgrounds/funfact-bg.webp') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="fun-fact-wrapper">
                        <div class="row">
                            <div class="single-fact col-md-3 col-6 section-space--bottom--30">
                                <img width="60" height="60" src="{{ asset('assets/img/icons/funfact-project.webp') }}" alt="">
                                <h1 class="counter">598</h1>
                                <h4>Project</h4>
                            </div>
                            <div class="single-fact col-md-3 col-6 section-space--bottom--30">
                                <img width="43" height="60" src="{{ asset('assets/img/icons/funfact-clients.webp') }}" alt="">
                                <h1 class="counter">128</h1>
                                <h4>Clients</h4>
                            </div>
                            <div class="single-fact col-md-3 col-6 section-space--bottom--30">
                                <img width="32" height="60" src="{{ asset('assets/img/icons/funfact-success.webp') }}" alt="">
                                <h1 class="counter">114</h1>
                                <h4>Success</h4>
                            </div>
                            <div class="single-fact col-md-3 col-6 section-space--bottom--30">
                                <img width="46" height="60" src="{{ asset('assets/img/icons/funfact-award.webp') }}" alt="">
                                <h1 class="counter">109</h1>
                                <h4>Awards</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====================  End of fun fact area  ====================-->

    <!--====================  team member area ====================-->
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
    <!--====================  End of team member area  ====================-->

    <!--====================  testimonial slider area ====================-->
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
    <!--====================  End of testimonial slider area  ====================-->

    <!--====================  brand logo area ====================-->
    @if(\App\Models\SectionSetting::isSectionActive('brand_logos'))
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
