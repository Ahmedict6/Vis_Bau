<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Service;
use App\Models\Project;
use App\Models\BlogPost;
use App\Models\ContactMessage;
use App\Models\HeroSlider;
use App\Models\FunFact;
use App\Models\Testimonial;
use App\Models\TeamMember;
use App\Models\JobListing;
use App\Models\BrandLogo;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'pages' => Page::count(),
            'services' => Service::count(),
            'projects' => Project::count(),
            'blog_posts' => BlogPost::count(),
            'contact_messages' => ContactMessage::count(),
            'hero_sliders' => HeroSlider::count(),
            'fun_facts' => FunFact::count(),
            'testimonials' => Testimonial::count(),
            'team_members' => TeamMember::count(),
            'job_listings' => JobListing::count(),
            'brand_logos' => BrandLogo::count(),
        ];

        $recentMessages = ContactMessage::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentMessages'));
    }
}
