<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\SectionSetting;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Share section visibility status with all views
        View::composer('*', function ($view) {
            $view->with('sectionVisibility', [
                'services' => SectionSetting::isSectionActive('services'),
                'projects' => SectionSetting::isSectionActive('projects'),
                'blog_posts' => SectionSetting::isSectionActive('blog_posts'),
                'hero_slider' => SectionSetting::isSectionActive('hero_slider'),
                'fun_facts' => SectionSetting::isSectionActive('fun_facts'),
                'testimonials' => SectionSetting::isSectionActive('testimonials'),
                'team_members' => SectionSetting::isSectionActive('team_members'),
                'job_listings' => SectionSetting::isSectionActive('job_listings'),
                'brand_logos' => SectionSetting::isSectionActive('brand_logos'),
            ]);
        });
    }
}
