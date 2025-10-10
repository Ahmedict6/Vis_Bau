@extends('layouts.app')

@section('title', 'VIS GmbH - Ihr Partner für Bauprojekte')
@section('meta_description', 'Ihr Partner für innovative und zuverlässige Bauprojekte. Ob Neubau, Renovierung oder Sanierung – wir setzen Ihre Ideen in die Tat um.')

@section('content')
<!--====================  hero slider area ====================-->
@isset($heroSliders)
<div class="hero-alider-area">
    <div class="hero-slider__container-area">
        <div class="swiper-container hero-slider__container">
            <div class="swiper-wrapper hero-slider__wrapper">
                @forelse($heroSliders as $slider)
                <!--=======  single slider item  =======-->
                <div class="swiper-slide hero-slider__single-item bg-img" data-bg="{{ asset('assets/img/slider/' . $slider->background_image) }}">
                    <div class="hero-slider__content-wrapper">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="hero-slider__content">
                                        <h2 class="hero-slider__title">{{ $slider->title }}</h2>
                                        @if($slider->subtitle)
                                        <h3 class="hero-slider__subtitle">{{ $slider->subtitle }}</h3>
                                        @endif
                                        <p class="hero-slider__text">{{ $slider->description }}</p>
                                        <a class="hero-slider__btn" href="{{ $slider->button_url ?: route('contact') }}">{{ $slider->button_text }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--=======  End of single slider item  =======-->
                @empty
                <!--=======  Default slider item  =======-->
                <div class="swiper-slide hero-slider__single-item bg-img" data-bg="{{ asset('assets/img/slider/slider3.webp') }}">
                    <div class="hero-slider__content-wrapper">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="hero-slider__content">
                                        <h2 class="hero-slider__title">Ihr Partner für innovative und zuverlässige Bauprojekte</h2>
                                        <p class="hero-slider__text">Ob Neubau, Renovierung oder Sanierung – wir setzen Ihre Ideen in die Tat um. Mit jahrelanger Erfahrung, modernster Technik und einem engagierten Team garantieren wir höchste Qualität und termingerechte Fertigstellung.</p>
                                        <a class="hero-slider__btn" href="{{ route('contact') }}">KONTAKT</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--=======  End of default slider item  =======-->
                @endforelse

            </div>
        </div>
        <div class="ht-swiper-button-prev ht-swiper-button-prev-13 ht-swiper-button-nav d-none d-xl-block"><i class="ion-ios-arrow-left"></i></div>
        <div class="ht-swiper-button-next ht-swiper-button-next-13 ht-swiper-button-nav d-none d-xl-block"><i class="ion-ios-arrow-forward"></i></div>
    </div>
</div>
@endisset
<!--====================  End of hero slider area  ====================-->
<!--====================  service grid slider area ====================-->
@isset($services)
<div class="service-grid-slider-area section-space--inner--120">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-area text-center">
                    <h2 class="section-title section-space--bottom--50">Unsere Dienstleistungen <span class="title-icon"></span></h2>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="service-slider">
                    <div class="swiper-container service-slider__container">
                        <div class="swiper-wrapper service-slider__wrapper">
                            @forelse($services as $service)
                            <div class="swiper-slide">
                                <div class="service-grid-item">
                                    <div class="service-grid-item__image">
                                        <div class="service-grid-item__image-wrapper">
                                            <a href="{{ route('services.show', $service) }}">
                                                @if($service->image)
                                                    <img width="370" height="237" src="{{ asset('assets/img/service/' . $service->image) }}" class="img-fluid" alt="{{ $service->title }}">
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
                                        <a href="{{ route('services.show', $service) }}" class="see-more-link">MEHR ERFAHREN</a>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="swiper-slide">
                                <div class="service-grid-item">
                                    <div class="service-grid-item__image">
                                        <div class="service-grid-item__image-wrapper">
                                            <a href="{{ route('services.index') }}">
                                                <img width="370" height="237" src="{{ asset('assets/img/service/service1.webp') }}" class="img-fluid" alt="Rohbau">
                                            </a>
                                        </div>
                                        <div class="icon">
                                            <i class="flaticon-002-welding"></i>
                                        </div>
                                    </div>
                                    <div class="service-grid-item__content">
                                        <h3 class="title">
                                            <a href="{{ route('services.index') }}">Rohbau</a>
                                        </h3>
                                        <p class="subtitle">Der Rohbau ist der Grundstein eines Gebäudes. Wir errichten tragende Wände, Dachstuhl und Fundamente.</p>
                                        <a href="{{ route('services.index') }}" class="see-more-link">MEHR ERFAHREN</a>
                                    </div>
                                </div>
                            </div>
                            @endforelse
                        </div>
                    </div>

                    <div class="ht-swiper-button-prev ht-swiper-button-prev-4 ht-swiper-button-nav"><i class="ion-ios-arrow-left"></i></div>
                    <div class="ht-swiper-button-next ht-swiper-button-next-4 ht-swiper-button-nav"><i class="ion-ios-arrow-forward"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endisset
<!--====================  End of service grid slider area  ====================-->
<!--====================  fun fact area ====================-->
@isset($funFacts)
<div class="funfact-section section-space--inner--100 bg-img" data-bg="{{ asset('assets/img/backgrounds/funfact-bg.webp') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="fun-fact-wrapper">
                    <div class="row">
                        @forelse($funFacts as $fact)
                        <div class="single-fact col-md-3 col-6 section-space--bottom--30">
                            @if($fact->icon)
                            <img width="60" height="60" src="{{ asset('assets/img/icons/' . $fact->icon) }}" alt="">
                            @endif
                            <h1 class="counter">{{ $fact->number }}</h1>
                            <h4>{{ $fact->title }}</h4>
                        </div>
                        @empty
                        <div class="single-fact col-md-3 col-6 section-space--bottom--30">
                            <img width="60" height="60" src="{{ asset('assets/img/icons/funfact-project.webp') }}" alt="">
                            <h1 class="counter">150</h1>
                            <h4>Projekte</h4>
                        </div>
                        <div class="single-fact col-md-3 col-6 section-space--bottom--30">
                            <img width="43" height="60" src="{{ asset('assets/img/icons/funfact-clients.webp') }}" alt="">
                            <h1 class="counter">95</h1>
                            <h4>Zufriedene Kunden</h4>
                        </div>
                        <div class="single-fact col-md-3 col-6 section-space--bottom--30">
                            <img width="32" height="60" src="{{ asset('assets/img/icons/funfact-success.webp') }}" alt="">
                            <h1 class="counter">98</h1>
                            <h4>Erfolgsrate</h4>
                        </div>
                        <div class="single-fact col-md-3 col-6 section-space--bottom--30">
                            <img width="46" height="60" src="{{ asset('assets/img/icons/funfact-award.webp') }}" alt="">
                            <h1 class="counter">25</h1>
                            <h4>Jahre Erfahrung</h4>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endisset
<!--====================  End of fun fact area  ====================-->
<!--====================  video cta area ====================-->
<div class="video-cta-area section-space--inner--120">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12">
                <div class="video-cta-content">
                    <h4 class="video-cta-content__small-title">ÜBER UNS</h4>
                    <h3 class="video-cta-content__title">Ihr vertrauensvoller Baupartner</h3>
                    <p class="video-cta-content__text">Ihr Partner für innovative und zuverlässige Bauprojekte. Ob Neubau, Renovierung oder Sanierung – wir setzen Ihre Ideen in die Tat um. Mit jahrelanger Erfahrung, modernster Technik und einem engagierten Team garantieren wir höchste Qualität und termingerechte Fertigstellung.</p>
                    <a href="{{ route('contact') }}" class="ht-btn ht-btn--round">KONTAKT</a>
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1 col-md-12">
                <div class="cta-video-image">
                    <div class="video-popup">
                        <a href="https://www.youtube.com/watch?v=OrS-93U4AYQ">
                            <div class="cta-video-image__image">
                                <img width="470" height="523" src="{{ asset('assets/img/backgrounds/video-cta.webp') }}" class="img-fluid" alt="">
                            </div>
                            <div class="cta-video-image__icon">
                                <i class="ion-ios-play"></i>
                            </div>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!--====================  End of video cta area  ====================-->
<!--====================  project slider area ====================-->
@isset($projects)
<div class="project-slider-area grey-bg section-space--inner--120">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- section title -->
                <div class="section-title-area text-center">
                    <h2 class="section-title section-space--bottom--50">Aktuelle Projekte <span class="title-icon"></span></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="latest-project-slider">
                    <div class="latest-project-slider__container-area">
                        <div class="swiper-container latest-project-slider__container">
                            <div class="swiper-wrapper latest-project-slider__wrapper">
                                @forelse($projects as $index => $project)
                                <div class="swiper-slide latest-project-slider__single-slide">
                                    <div class="row row-30 align-items-center">
                                        <div class="col-lg-6">
                                            <div class="image">
                                                @if($project->featured_image)
                                                    <img width="639" height="395" src="{{ asset('assets/img/projects/' . $project->featured_image) }}" class="img-fluid" alt="{{ $project->title }}">
                                                @else
                                                    <img width="639" height="395" src="{{ asset('assets/img/projects/project-1.webp') }}" class="img-fluid" alt="{{ $project->title }}">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="content">
                                                <h3 class="count">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</h3>
                                                <h2 class="title">{{ $project->title }}</h2>
                                                <p class="desc">{{ Str::limit($project->description, 150) }}</p>
                                                <a href="{{ route('projects.show', $project) }}" class="see-more-link see-more-link--color">MEHR ANZEIGEN</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <div class="swiper-slide latest-project-slider__single-slide">
                                    <div class="row row-30 align-items-center">
                                        <div class="col-lg-6">
                                            <div class="image">
                                                <img width="639" height="395" src="{{ asset('assets/img/projects/project-1.webp') }}" class="img-fluid" alt="Default Project">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="content">
                                                <h3 class="count">01</h3>
                                                <h2 class="title">Wohnkomplex Mannheim</h2>
                                                <p class="desc">Erfolgreich abgeschlossenes Wohnprojekt mit mehreren Einheiten. Dieses Projekt zeigt unsere Expertise in der Errichtung moderner Wohnanlagen.</p>
                                                <a href="{{ route('projects.index') }}" class="see-more-link see-more-link--color">MEHR ANZEIGEN</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforelse
                            </div>
                        </div>
                        <div class="ht-swiper-button-prev ht-swiper-button-prev-16 ht-swiper-button-nav"><i class="ion-ios-arrow-left"></i></div>
                        <div class="ht-swiper-button-next ht-swiper-button-next-16 ht-swiper-button-nav"><i class="ion-ios-arrow-forward"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endisset
<!--====================  End of project slider area  ====================-->
<!--====================  team job area ====================-->
@isset($jobListings)
<div class="team-job-area section-space--inner--120">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="team-job__content">
                    <div class="team-job__title-wrapper">
                        <h2 class="team-job__title">Lernen Sie unser <br> engagiertes Team kennen.</h2>
                            <a href="#" class="see-more-link see-more-link--color">Team vorstellen</a>
                    </div>

                    <div class="team-job__content-wrapper">
                        <h2 class="team-job__title">Offene Stellen <span><a href="#" class="see-more-link see-more-link--color">ALLE STELLEN ANZEIGEN</a></span></h2>
                        <div class="team-job__list-wrapper">
                            @forelse($jobListings->take(3) as $job)
                            <div class="team-job__single">
                                <h3 class="title"> <a href="#">{{ $job->title }}</a></h3>
                                <p class="text">{{ $job->description ?: 'Join our team and be part of something great!' }}</p>
                            </div>
                            @empty
                            <div class="team-job__single">
                                <h3 class="title"> <a href="#">Bauleiter / Projektmanager</a></h3>
                                <p class="text">Werden Sie Teil unseres Teams und arbeiten Sie an spannenden Bauprojekten mit!</p>
                            </div>
                            <div class="team-job__single">
                                <h3 class="title"> <a href="#">Maurer / Betonbauer</a></h3>
                                <p class="text">Werden Sie Teil unseres Teams und arbeiten Sie an spannenden Bauprojekten mit!</p>
                            </div>
                            <div class="team-job__single">
                                <h3 class="title"> <a href="#">Baumaschinenführer</a></h3>
                                <p class="text">Werden Sie Teil unseres Teams und arbeiten Sie an spannenden Bauprojekten mit!</p>
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="team-job__image text-center">
                    <img width="489" height="719" src="{{ asset('assets/img/team/team.webp') }}" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
@endisset
<!--====================  End of team job area  ====================-->
<!--====================  testimonial slider area ====================-->
@isset($testimonials)
<div class="testimonial-slider-area testimonial-slider-area-bg section-space--inner--120 bg-img" data-bg="{{ asset('assets/img/backgrounds/testimonial.webp') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 m-auto">
                <div class="testimonial-slider">
                    <div class="testimonial-slider__container-area">
                        <div class="swiper-container testimonial-slider__container">
                            <div class="swiper-wrapper testimonial-slider__wrapper">
                                @forelse($testimonials as $testimonial)
                                <div class="swiper-slide testimonial-slider__single-slide">
                                    <div class="author">
                                        <div class="author__image">
                                            <img width="100" height="100" src="{{ asset('assets/img/testimonial/' . ($testimonial->image ?: '1.webp')) }}" alt="">
                                        </div>
                                        <div class="author__details">
                                            <h4 class="name">{{ $testimonial->name }}</h4>
                                            @if($testimonial->designation)
                                            <div class="designation">{{ $testimonial->designation }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="content">
                                        {{ $testimonial->content }}
                                    </div>
                                </div>
                                @empty
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
                                        Ihr Partner für innovative und zuverlässige Bauprojekte. Whether new construction, renovation or refurbishment – we turn your ideas into reality. With many years of experience, state‑of‑the‑art technology and a committed team, we guarantee top quality and on‑time completion.
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
@endisset
<!--====================  End of testimonial slider area  ====================-->
<!--====================  blog grid area ====================-->
@isset($blogPosts)
<div class="blog-grid-area grey-bg section-space--inner--120">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- section title -->
                <div class="section-title-area text-center">
                    <h2 class="section-title section-space--bottom--50">Neuer Blog <span class="title-icon"></span></h2>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="blog-grid-wrapper">
                    <div class="row">
                        @forelse($blogPosts as $post)
                        <div class="col-lg-4">
                            <div class="blog-post-slider__single-slide blog-post-slider__single-slide--grid-view">
                                <div class="blog-post-slider__image section-space--bottom--30">
                                    <a href="{{ route('blog.show', $post) }}">
                                        @if($post->featured_image)
                                            <img width="370" height="240" src="{{ asset('assets/img/blog/' . $post->featured_image) }}" class="img-fluid" alt="{{ $post->title }}">
                                        @else
                                            <img width="370" height="240" src="{{ asset('assets/img/blog/blog1.webp') }}" class="img-fluid" alt="{{ $post->title }}">
                                        @endif
                                    </a>
                                </div>
                                <div class="blog-post-slider__content">
                                    <p class="post-date">{{ $post->published_at->format('j. F Y') }}</p>
                                    <h3 class="post-title">
                                        <a href="{{ route('blog.show', $post) }}">{{ $post->title }}</a>
                                    </h3>
                                    <p class="post-excerpt">{{ Str::limit($post->excerpt, 120) }}</p>
                                    <a href="{{ route('blog.show', $post) }}" class="see-more-link">MEHR LESEN</a>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-lg-12">
                            <div class="text-center">
                                <p>Keine Blog-Beiträge verfügbar.</p>
                            </div>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endisset
<!--====================  End of blog grid area  ====================-->
<!--====================  brand logo area ====================-->
@isset($brandLogos)
<div class="brand-logo-slider-area section-space--inner--60">
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
                                    <a href="{{ $logo->website_url ?: '#' }}">
                                        <img width="152" height="51" src="{{ asset('assets/img/brand-logos/' . $logo->logo) }}" class="img-fluid" alt="{{ $logo->name }}">
                                    </a>
                                </div>
                            </div>
                            @empty
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
@endisset
<!--====================  End of brand logo area  ====================-->
@endsection
