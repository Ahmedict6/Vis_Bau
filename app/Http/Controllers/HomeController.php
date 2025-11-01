<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\Service;
use App\Models\Project;
use App\Models\BlogPost;
use App\Models\HeroSlider;
use App\Models\FunFact;
use App\Models\Testimonial;
use App\Models\TeamMember;
use App\Models\JobListing;
use App\Models\BrandLogo;
use App\Models\HomeVideo;
use App\Models\SectionSetting;

class HomeController extends Controller
{
    public function index()
    {
        // Cache homepage data for 1 hour to improve performance
        $cacheKey = 'homepage_data';

        if (Cache::has($cacheKey)) {
            $data = Cache::get($cacheKey);
        } else {
            $data = [];

            // Check each section's visibility before loading data
            if (SectionSetting::isSectionActive('hero_slider')) {
                $data['heroSliders'] = HeroSlider::where('is_active', true)
                    ->orderBy('sort_order')
                    ->get();
            }

            if (SectionSetting::isSectionActive('home_video')) {
                $homeVideo = HomeVideo::where('is_active', true)->first();
                if ($homeVideo) {
                    $data['homeVideo'] = $homeVideo;
                }
            }

            if (SectionSetting::isSectionActive('services')) {
                $data['services'] = Service::where('is_published', true)
                    ->orderBy('sort_order')
                    ->take(6)
                    ->get();
            }

            if (SectionSetting::isSectionActive('projects')) {
                $data['projects'] = Project::where('is_published', true)
                    ->where('is_featured', true)
                    ->orderBy('sort_order')
                    ->take(6)
                    ->get();
            }

            if (SectionSetting::isSectionActive('fun_facts')) {
                $data['funFacts'] = FunFact::where('is_active', true)
                    ->orderBy('sort_order')
                    ->get();
            }

            if (SectionSetting::isSectionActive('testimonials')) {
                $data['testimonials'] = Testimonial::where('is_active', true)
                    ->orderBy('sort_order')
                    ->get();
            }

            if (SectionSetting::isSectionActive('team_members')) {
                $data['teamMembers'] = TeamMember::where('is_active', true)
                    ->orderBy('sort_order')
                    ->get();
            }

            if (SectionSetting::isSectionActive('blog_posts')) {
                $data['blogPosts'] = BlogPost::where('is_published', true)
                    ->orderBy('published_at', 'desc')
                    ->take(3)
                    ->get();
            }

            if (SectionSetting::isSectionActive('job_listings')) {
                $data['jobListings'] = JobListing::where('is_active', true)
                    ->orderBy('sort_order')
                    ->get();
            }

            if (SectionSetting::isSectionActive('brand_logos')) {
                $data['brandLogos'] = BrandLogo::where('is_active', true)
                    ->orderBy('sort_order')
                    ->get();
            }

            // Cache the data for 1 hour
            Cache::put($cacheKey, $data, 3600);
        }

        return view('home', $data);
    }
}
