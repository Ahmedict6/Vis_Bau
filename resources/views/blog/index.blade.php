@extends('layouts.app')

@section('title', 'Our Blog - VIS GmbH')
@section('meta_description', 'Read our latest construction insights, tips, and industry news.')

@section('content')
<div class="page-title-area bg-img" data-bg="{{ asset('assets/img/backgrounds/about.webp') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-title-content text-center">
                    <h2 class="title">Our Blog</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Blog</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="blog-grid-area section-space--inner--120">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-area text-center">
                    <h2 class="section-title section-space--bottom--50">Latest News & Insights <span class="title-icon"></span></h2>
                    <p class="section-subtitle">Stay updated with construction trends and industry insights</p>
                </div>
            </div>
        </div>

        <!-- Search and Filter Section -->
        <div class="row mb-4">
            <div class="col-lg-12">
                <form method="GET" action="{{ route('blog.index') }}" class="search-form d-flex justify-content-center gap-3">
                    <div class="search-input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search blog posts..." value="{{ request('search') }}">
                    </div>
                    <div class="category-filter">
                        <select name="category" class="form-select">
                            <option value="">All Categories</option>
                            @foreach($categories as $category)
                                <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>{{ $category }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                    @if(request('search') || request('category'))
                        <a href="{{ route('blog.index') }}" class="btn btn-outline-secondary">Clear</a>
                    @endif
                </form>
            </div>
        </div>

        @if($blogPosts->count() > 0)
        <div class="row">
            @foreach($blogPosts as $post)
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="blog-grid-item">
                    <div class="blog-grid-item__image">
                        <div class="blog-grid-item__image-wrapper">
                            <a href="{{ route('blog.show', $post) }}">
                                @if($post->featured_image)
                                <img width="370" height="237" src="{{ asset('assets/img/blog/' . $post->featured_image) }}" class="img-fluid" alt="{{ $post->title }}">
                                @else
                                <img width="370" height="237" src="{{ asset('assets/img/blog/blog1.webp') }}" class="img-fluid" alt="{{ $post->title }}">
                                @endif
                            </a>
                        </div>
                        <div class="blog-grid-item__content">
                            <div class="blog-meta">
                                <span class="date">{{ $post->published_at->format('M d, Y') }}</span>
                                @if($post->category)
                                <span class="category">{{ $post->category }}</span>
                                @endif
                            </div>
                            <h3 class="title">
                                <a href="{{ route('blog.show', $post) }}">{{ $post->title }}</a>
                            </h3>
                            <p class="excerpt">{{ Str::limit($post->excerpt, 120) }}</p>
                            <div class="blog-author">
                                <span>By {{ $post->author }}</span>
                            </div>
                            <a href="{{ route('blog.show', $post) }}" class="read-more-link">READ MORE</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="pagination-wrapper text-center">
                    {{ $blogPosts->links() }}
                </div>
            </div>
        </div>
        @else
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <h3>No Blog Posts Available</h3>
                    <p>We are currently working on creating valuable content for you. Please check back soon!</p>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection

