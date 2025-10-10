@extends('layouts.app')

@section('title', $post->title . ' - VIS GmbH')
@section('meta_description', $post->excerpt)

@section('content')
<div class="page-title-area bg-img" data-bg="{{ asset('assets/img/backgrounds/about.webp') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-title-content text-center">
                    <h2 class="title">{{ $post->title }}</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('blog.index') }}">Blog</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ Str::limit($post->title, 30) }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="blog-details-area section-space--inner--120">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog-details-content">
                    @if($post->featured_image)
                    <div class="blog-details-image">
                        <img src="{{ asset('assets/img/blog/' . $post->featured_image) }}" alt="{{ $post->title }}" class="img-fluid">
                    </div>
                    @endif

                    <div class="blog-meta">
                        <span class="date">{{ $post->published_at->format('M d, Y') }}</span>
                        <span class="author">By {{ $post->author }}</span>
                        @if($post->category)
                        <span class="category">{{ $post->category }}</span>
                        @endif
                    </div>

                    <div class="blog-details-text">
                        <h3>{{ $post->title }}</h3>
                        <div class="blog-content">
                            {!! nl2br(e($post->content)) !!}
                        </div>

                        @if($post->tags && is_array($post->tags))
                        <div class="blog-tags">
                            <h5>Tags:</h5>
                            @foreach($post->tags as $tag)
                            <span class="tag">{{ $tag }}</span>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="blog-details-sidebar">
                    <div class="sidebar-widget">
                        <h4 class="widget-title">About the Author</h4>
                        <div class="author-info">
                            <p><strong>{{ $post->author }}</strong></p>
                            <p>Construction industry expert with years of experience in building and development projects.</p>
                        </div>
                    </div>

                    @if($relatedPosts->count() > 0)
                    <div class="sidebar-widget">
                        <h4 class="widget-title">Related Posts</h4>
                        <div class="related-posts">
                            @foreach($relatedPosts as $relatedPost)
                            <div class="related-post-item">
                                <a href="{{ route('blog.show', $relatedPost) }}">
                                    @if($relatedPost->featured_image)
                                    <img src="{{ asset('assets/img/blog/' . $relatedPost->featured_image) }}" alt="{{ $relatedPost->title }}" width="80" height="60">
                                    @else
                                    <img src="{{ asset('assets/img/blog/blog1.webp') }}" alt="{{ $relatedPost->title }}" width="80" height="60">
                                    @endif
                                    <div class="related-post-content">
                                        <h6>{{ $relatedPost->title }}</h6>
                                        <span class="date">{{ $relatedPost->published_at->format('M d, Y') }}</span>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <div class="sidebar-widget">
                        <h4 class="widget-title">Get in Touch</h4>
                        <p>Have questions about our services or want to discuss your project?</p>
                        <a href="{{ route('contact') }}" class="btn btn-primary">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

