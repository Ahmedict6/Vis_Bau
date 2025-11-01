<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SectionSetting;

class SectionSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sections = [
            [
                'section_key' => 'hero_slider',
                'section_name' => 'Hero Slider',
                'section_description' => 'Main slider/carousel displayed at the top of the homepage',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'section_key' => 'home_video',
                'section_name' => 'Home Video Section',
                'section_description' => 'Video section displayed on the homepage after hero slider',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'section_key' => 'services',
                'section_name' => 'Services Section',
                'section_description' => 'Controls Services pages, menu links, and homepage display',
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'section_key' => 'projects',
                'section_name' => 'Projects Section',
                'section_description' => 'Controls Projects pages, menu links, and homepage display',
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'section_key' => 'fun_facts',
                'section_name' => 'Facts Section',
                'section_description' => 'Display statistics/counters on the homepage',
                'is_active' => true,
                'sort_order' => 5,
            ],
            [
                'section_key' => 'testimonials',
                'section_name' => 'Testimonials Section',
                'section_description' => 'Display client testimonials on the homepage',
                'is_active' => true,
                'sort_order' => 6,
            ],
            [
                'section_key' => 'team_members',
                'section_name' => 'Team Members Section',
                'section_description' => 'Display team members on the homepage',
                'is_active' => true,
                'sort_order' => 7,
            ],
            [
                'section_key' => 'blog_posts',
                'section_name' => 'Blog Posts Section',
                'section_description' => 'Controls Blog pages, menu links, and homepage display',
                'is_active' => true,
                'sort_order' => 8,
            ],
            [
                'section_key' => 'job_listings',
                'section_name' => 'Job Listings Section',
                'section_description' => 'Display job openings on the homepage',
                'is_active' => true,
                'sort_order' => 9,
            ],
            [
                'section_key' => 'brand_logos',
                'section_name' => 'Brand Logos Section',
                'section_description' => 'Controls brand logos on ALL pages (Home, About, Contact, Projects)',
                'is_active' => true,
                'sort_order' => 10,
            ],
        ];

        foreach ($sections as $section) {
            SectionSetting::updateOrCreate(
                ['section_key' => $section['section_key']],
                $section
            );
        }
    }
}
