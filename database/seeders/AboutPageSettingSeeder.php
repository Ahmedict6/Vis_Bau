<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AboutPageSetting;

class AboutPageSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            // Page Meta
            [
                'key' => 'page_title',
                'value' => 'About Us - VIS GmbH',
                'type' => 'text',
                'group' => 'meta',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'key' => 'meta_description',
                'value' => 'Learn more about VIS GmbH - Your partner for innovative and reliable building projects. With years of experience, we deliver quality construction services.',
                'type' => 'textarea',
                'group' => 'meta',
                'is_active' => true,
                'sort_order' => 2,
            ],

            // Breadcrumb
            [
                'key' => 'breadcrumb_title',
                'value' => 'About Us',
                'type' => 'text',
                'group' => 'breadcrumb',
                'is_active' => true,
                'sort_order' => 1,
            ],

            // Welcome Section
            [
                'key' => 'welcome_show',
                'value' => '1',
                'type' => 'boolean',
                'group' => 'welcome',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'key' => 'welcome_image',
                'value' => 'assets/img/about/about-3.webp',
                'type' => 'image',
                'group' => 'welcome',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'key' => 'welcome_video_url',
                'value' => 'https://www.youtube.com/watch?v=LTauBc7lDIg',
                'type' => 'text',
                'group' => 'welcome',
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'key' => 'welcome_subtitle',
                'value' => 'Welcome to VIS GmbH',
                'type' => 'text',
                'group' => 'welcome',
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'key' => 'welcome_title',
                'value' => '50 Years of Experience in Industry',
                'type' => 'text',
                'group' => 'welcome',
                'is_active' => true,
                'sort_order' => 5,
            ],
            [
                'key' => 'welcome_heading',
                'value' => 'We are ready to build your dream project with excellence and precision',
                'type' => 'text',
                'group' => 'welcome',
                'is_active' => true,
                'sort_order' => 6,
            ],
            [
                'key' => 'welcome_content',
                'value' => 'At VIS GmbH, we bring together expertise, innovation, and reliability to deliver exceptional construction services. With decades of experience in the industry, we have successfully completed hundreds of projects, ranging from residential buildings to complex commercial structures. Our commitment to quality, safety, and customer satisfaction sets us apart in the construction industry.',
                'type' => 'textarea',
                'group' => 'welcome',
                'is_active' => true,
                'sort_order' => 7,
            ],

            // Features Section
            [
                'key' => 'features_show',
                'value' => '1',
                'type' => 'boolean',
                'group' => 'features',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'key' => 'feature_1_icon',
                'value' => 'assets/img/icons/feature-1.webp',
                'type' => 'image',
                'group' => 'features',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'key' => 'feature_1_title',
                'value' => 'Top Rated',
                'type' => 'text',
                'group' => 'features',
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'key' => 'feature_1_content',
                'value' => 'Consistently rated as one of the top construction companies in the region, delivering excellence in every project.',
                'type' => 'textarea',
                'group' => 'features',
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'key' => 'feature_2_icon',
                'value' => 'assets/img/icons/feature-2.webp',
                'type' => 'image',
                'group' => 'features',
                'is_active' => true,
                'sort_order' => 5,
            ],
            [
                'key' => 'feature_2_title',
                'value' => 'Best Quality',
                'type' => 'text',
                'group' => 'features',
                'is_active' => true,
                'sort_order' => 6,
            ],
            [
                'key' => 'feature_2_content',
                'value' => 'We use premium materials and employ skilled craftsmen to ensure the highest quality in all our construction projects.',
                'type' => 'textarea',
                'group' => 'features',
                'is_active' => true,
                'sort_order' => 7,
            ],
            [
                'key' => 'feature_3_icon',
                'value' => 'assets/img/icons/feature-3.webp',
                'type' => 'image',
                'group' => 'features',
                'is_active' => true,
                'sort_order' => 8,
            ],
            [
                'key' => 'feature_3_title',
                'value' => 'Competitive Pricing',
                'type' => 'text',
                'group' => 'features',
                'is_active' => true,
                'sort_order' => 9,
            ],
            [
                'key' => 'feature_3_content',
                'value' => 'We offer transparent, competitive pricing without compromising on quality, ensuring the best value for your investment.',
                'type' => 'textarea',
                'group' => 'features',
                'is_active' => true,
                'sort_order' => 10,
            ],

            // Experience Section
            [
                'key' => 'experience_show',
                'value' => '1',
                'type' => 'boolean',
                'group' => 'experience',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'key' => 'experience_image_1',
                'value' => 'assets/img/about/about-1.webp',
                'type' => 'image',
                'group' => 'experience',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'key' => 'experience_image_2',
                'value' => 'assets/img/about/about-2.webp',
                'type' => 'image',
                'group' => 'experience',
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'key' => 'experience_years',
                'value' => '50',
                'type' => 'number',
                'group' => 'experience',
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'key' => 'experience_title',
                'value' => 'Years of Experience',
                'type' => 'text',
                'group' => 'experience',
                'is_active' => true,
                'sort_order' => 5,
            ],
            [
                'key' => 'experience_content_1',
                'value' => 'Over five decades of construction excellence, VIS GmbH has established itself as a trusted name in the industry. Our extensive experience spans across various construction sectors, from residential developments to large-scale commercial projects. We bring innovation, precision, and dedication to every project we undertake.',
                'type' => 'textarea',
                'group' => 'experience',
                'is_active' => true,
                'sort_order' => 6,
            ],
            [
                'key' => 'experience_content_2',
                'value' => 'Our team of experienced professionals combines traditional craftsmanship with modern construction techniques to deliver outstanding results. We stay updated with the latest industry trends and technologies to provide our clients with cutting-edge solutions that meet their unique needs and exceed expectations.',
                'type' => 'textarea',
                'group' => 'experience',
                'is_active' => true,
                'sort_order' => 7,
            ],

            // Fun Facts Section
            [
                'key' => 'funfacts_show',
                'value' => '1',
                'type' => 'boolean',
                'group' => 'funfacts',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'key' => 'funfact_1_icon',
                'value' => 'assets/img/icons/funfact-project.webp',
                'type' => 'image',
                'group' => 'funfacts',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'key' => 'funfact_1_number',
                'value' => '598',
                'type' => 'number',
                'group' => 'funfacts',
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'key' => 'funfact_1_label',
                'value' => 'Projects',
                'type' => 'text',
                'group' => 'funfacts',
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'key' => 'funfact_2_icon',
                'value' => 'assets/img/icons/funfact-clients.webp',
                'type' => 'image',
                'group' => 'funfacts',
                'is_active' => true,
                'sort_order' => 5,
            ],
            [
                'key' => 'funfact_2_number',
                'value' => '128',
                'type' => 'number',
                'group' => 'funfacts',
                'is_active' => true,
                'sort_order' => 6,
            ],
            [
                'key' => 'funfact_2_label',
                'value' => 'Happy Clients',
                'type' => 'text',
                'group' => 'funfacts',
                'is_active' => true,
                'sort_order' => 7,
            ],
            [
                'key' => 'funfact_3_icon',
                'value' => 'assets/img/icons/funfact-success.webp',
                'type' => 'image',
                'group' => 'funfacts',
                'is_active' => true,
                'sort_order' => 8,
            ],
            [
                'key' => 'funfact_3_number',
                'value' => '114',
                'type' => 'number',
                'group' => 'funfacts',
                'is_active' => true,
                'sort_order' => 9,
            ],
            [
                'key' => 'funfact_3_label',
                'value' => 'Success Rate %',
                'type' => 'text',
                'group' => 'funfacts',
                'is_active' => true,
                'sort_order' => 10,
            ],
            [
                'key' => 'funfact_4_icon',
                'value' => 'assets/img/icons/funfact-award.webp',
                'type' => 'image',
                'group' => 'funfacts',
                'is_active' => true,
                'sort_order' => 11,
            ],
            [
                'key' => 'funfact_4_number',
                'value' => '109',
                'type' => 'number',
                'group' => 'funfacts',
                'is_active' => true,
                'sort_order' => 12,
            ],
            [
                'key' => 'funfact_4_label',
                'value' => 'Awards Won',
                'type' => 'text',
                'group' => 'funfacts',
                'is_active' => true,
                'sort_order' => 13,
            ],

            // Other Sections Visibility
            [
                'key' => 'team_show',
                'value' => '1',
                'type' => 'boolean',
                'group' => 'sections',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'key' => 'testimonials_show',
                'value' => '1',
                'type' => 'boolean',
                'group' => 'sections',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'key' => 'brand_logos_show',
                'value' => '1',
                'type' => 'boolean',
                'group' => 'sections',
                'is_active' => true,
                'sort_order' => 3,
            ],
        ];

        foreach ($settings as $setting) {
            AboutPageSetting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }
}
