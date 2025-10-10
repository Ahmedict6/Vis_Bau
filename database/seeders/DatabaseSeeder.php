<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Service;
use App\Models\Project;
use App\Models\BlogPost;
use App\Models\Page;
use App\Models\HeroSlider;
use App\Models\FunFact;
use App\Models\Testimonial;
use App\Models\TeamMember;
use App\Models\JobListing;
use App\Models\BrandLogo;
use App\Models\SectionSetting;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed section settings first
        $this->call(SectionSettingSeeder::class);

        // Seed about page settings
        $this->call(AboutPageSettingSeeder::class);

        // Create admin user if not exists
        User::firstOrCreate(
            ['email' => 'admin@vis-bau.com'],
            [
                'name' => 'VIS GmbH Admin',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
            ]
        );

        // Create services
        Service::firstOrCreate(
            ['slug' => 'rohbau'],
            [
            'title' => 'Rohbau',
            'slug' => 'rohbau',
            'description' => 'Der Rohbau ist der Grundstein eines Gebäudes. Wir errichten tragende Wände, Dachstuhl und Fundamente.',
            'content' => 'Der Rohbau ist der Grundstein eines Gebäudes. Wir errichten tragende Wände, Dachstuhl und Fundamente. Unser erfahrenes Team sorgt für eine solide, vorschriftsgemäße Ausführung. Mit Expertise und Qualitätsanspruch bieten wir zuverlässigen Rohbau‑Service.',
            'icon' => 'service-1.webp',
            'image' => 'service-1.webp',
            'features' => json_encode(['Tragende Wände', 'Dachstuhl', 'Fundamente', 'Vorschriftsgemäße Ausführung']),
            'is_published' => true,
            'sort_order' => 1,
        ]);

        Service::create([
            'title' => 'Umbau und Abbruch',
            'slug' => 'umbau-und-abbruch',
            'description' => 'Als Profi‑Bauunternehmen bieten wir Abbruch‑ und Umbauarbeiten an.',
            'content' => 'Als Profi‑Bauunternehmen bieten wir Abbruch‑ und Umbauarbeiten an. Unser erfahrenes Team nutzt moderne Ausrüstung für effiziente, sichere Abtragungen und Umbauten. Wir passen bestehende Strukturen fachgerecht an und sind zuverlässig.',
            'icon' => 'service-2.webp',
            'image' => 'service-2.webp',
            'features' => json_encode(['Abbrucharbeiten', 'Umbauarbeiten', 'Moderne Ausrüstung', 'Fachgerechte Anpassung']),
            'is_published' => true,
            'sort_order' => 2,
        ]);

        Service::create([
            'title' => 'Garten‑/Landschaftsbau',
            'slug' => 'garten-landschaftsbau',
            'description' => 'Wir bieten professionelle Garten- und Landschaftsbau‑Dienstleistungen an.',
            'content' => 'Wir bieten professionelle Garten- und Landschaftsbau‑Dienstleistungen an. Unser erfahrenes Team verwandelt Außenbereiche in grüne Oasen durch Gartenplanung, Pflanzenauswahl, Rasen‑ und Baumpflege sowie Terrassengestaltung.',
            'icon' => 'service-3.webp',
            'image' => 'service-3.webp',
            'features' => json_encode(['Gartenplanung', 'Pflanzenauswahl', 'Rasen- und Baumpflege', 'Terrassengestaltung']),
            'is_published' => true,
            'sort_order' => 3,
        ]);

        Service::create([
            'title' => 'Schlüsselfertiges Bauen',
            'slug' => 'schluesselfertiges-bauen',
            'description' => 'Wir bieten schlüsselfertiges Bauen an: von der Planung bis zur Übergabe.',
            'content' => 'Wir bieten schlüsselfertiges Bauen an: von der Planung bis zur Übergabe. Unser erfahrenes Team und Netzwerk aus Fachleuten gewährleisten termingerechte, qualitativ hochwertige Bauprojekte, die individuell auf Kundenwünsche abgestimmt sind.',
            'icon' => 'service-4.webp',
            'image' => 'service-4.webp',
            'features' => json_encode(['Planung', 'Ausführung', 'Übergabe', 'Individuelle Anpassung']),
            'is_published' => true,
            'sort_order' => 4,
        ]);

        // Create projects
        Project::create([
            'title' => 'Wohnkomplex Mannheim',
            'slug' => 'wohnkomplex-mannheim',
            'description' => 'Erfolgreich abgeschlossenes Wohnprojekt mit mehreren Einheiten.',
            'content' => 'Unser Bauunternehmen hat zahlreiche Bauprojekte erfolgreich abgeschlossen, von Ein- und Mehrfamilienhäusern bis hin zu großen Wohnkomplexen. Dieses Projekt zeigt unsere Expertise in der Errichtung moderner Wohnanlagen.',
            'featured_image' => 'project-1.webp',
            'gallery' => json_encode(['project-1.webp', 'project-2.webp']),
            'client' => 'Private Investor',
            'location' => 'Mannheim, Germany',
            'completion_date' => '2023-12-01',
            'project_type' => 'Residential',
            'is_featured' => true,
            'is_published' => true,
            'sort_order' => 1,
        ]);

        Project::create([
            'title' => 'Gewerbeimmobilie Mannheim',
            'slug' => 'gewerbeimmobilie-mannheim',
            'description' => 'Professioneller Gewerbebau mit modernster Ausstattung.',
            'content' => 'Dieses Projekt demonstriert unsere Fähigkeiten im Gewerbebau. Mit unserem erfahrenen Team und modernster Ausrüstung liefern wir termingerechte und qualitativ hochwertige Ergebnisse.',
            'featured_image' => 'project-2.webp',
            'gallery' => json_encode(['project-2.webp', 'project-3.webp']),
            'client' => 'Commercial Developer',
            'location' => 'Mannheim, Germany',
            'completion_date' => '2023-11-15',
            'project_type' => 'Commercial',
            'is_featured' => true,
            'is_published' => true,
            'sort_order' => 2,
        ]);

        Project::create([
            'title' => 'Industrielle Produktionshalle',
            'slug' => 'industrielle-produktionshalle',
            'description' => 'Groß angelegte Industrieanlage mit spezialisierten Anforderungen.',
            'content' => 'Bei diesem Großprojekt haben wir unsere Kompetenz unter Beweis gestellt. Schwere Maschinen und spezialisierte Ausrüstung waren erforderlich, um die hohen Standards zu erfüllen.',
            'featured_image' => 'project-3.webp',
            'gallery' => json_encode(['project-3.webp', 'project-4.webp']),
            'client' => 'Industrial Corporation',
            'location' => 'Mannheim, Germany',
            'completion_date' => '2023-10-30',
            'project_type' => 'Industrial',
            'is_featured' => true,
            'is_published' => true,
            'sort_order' => 3,
        ]);

        // Create blog posts
        BlogPost::create([
            'title' => 'Innovative Construction Techniques',
            'slug' => 'innovative-construction-techniques',
            'excerpt' => 'Discover the latest innovative construction techniques that are revolutionizing the building industry.',
            'content' => 'The construction industry is constantly evolving with new technologies and techniques that improve efficiency, safety, and sustainability. In this article, we explore some of the most innovative construction methods that are shaping the future of building.',
            'featured_image' => 'blog-1.webp',
            'meta_title' => 'Innovative Construction Techniques - VIS GmbH',
            'meta_description' => 'Learn about the latest innovative construction techniques revolutionizing the building industry.',
            'author' => 'Admin',
            'tags' => json_encode(['construction', 'innovation', 'technology']),
            'category' => 'Construction',
            'is_published' => true,
            'published_at' => now(),
        ]);

        BlogPost::create([
            'title' => 'Sustainable Building Practices',
            'slug' => 'sustainable-building-practices',
            'excerpt' => 'Learn about sustainable building practices that benefit both the environment and your construction project.',
            'content' => 'Sustainability in construction is no longer just a trend—it\'s a necessity. This comprehensive guide covers sustainable building practices that can reduce environmental impact while improving project efficiency and long-term value.',
            'featured_image' => 'blog-2.webp',
            'meta_title' => 'Sustainable Building Practices - VIS GmbH',
            'meta_description' => 'Discover sustainable building practices that benefit the environment and your construction project.',
            'author' => 'Admin',
            'tags' => json_encode(['sustainability', 'environment', 'green building']),
            'category' => 'Sustainability',
            'is_published' => true,
            'published_at' => now()->subDays(1),
        ]);

        // Create pages
        Page::create([
            'title' => 'Privacy Policy',
            'slug' => 'privacy-policy',
            'content' => 'This privacy policy explains how we collect, use, and protect your personal information when you visit our website.',
            'excerpt' => 'Our privacy policy explains how we handle your personal information.',
            'meta_title' => 'Privacy Policy - VIS GmbH',
            'meta_description' => 'Learn about our privacy policy and how we protect your personal information.',
            'is_published' => true,
            'sort_order' => 1,
        ]);

        Page::create([
            'title' => 'Terms of Service',
            'slug' => 'terms-of-service',
            'content' => 'These terms of service govern your use of our website and services.',
            'excerpt' => 'Our terms of service outline the rules and regulations for using our website.',
            'meta_title' => 'Terms of Service - VIS GmbH',
            'meta_description' => 'Read our terms of service to understand the rules for using our website.',
            'is_published' => true,
            'sort_order' => 2,
        ]);

        // Create Hero Sliders
        HeroSlider::create([
            'title' => 'Ihr Partner für innovative und zuverlässige Bauprojekte',
            'subtitle' => 'VIS GmbH - Ihr Bauunternehmen',
            'description' => 'Ob Neubau, Renovierung oder Sanierung – wir setzen Ihre Ideen in die Tat um. Mit jahrelanger Erfahrung, modernster Technik und einem engagierten Team garantieren wir höchste Qualität und termingerechte Fertigstellung.',
            'button_text' => 'KONTAKT',
            'button_url' => '/contact',
            'background_image' => 'slider3.webp',
            'is_active' => true,
            'sort_order' => 1,
        ]);

        HeroSlider::create([
            'title' => '50 Jahre Erfahrung im Bauwesen',
            'subtitle' => 'Vertrauen Sie unserer Expertise',
            'description' => 'Von der Planung bis zur Übergabe - wir begleiten Ihr Projekt von Anfang bis Ende. Unser erfahrenes Team sorgt für eine solide, vorschriftsgemäße Ausführung aller Bauarbeiten.',
            'button_text' => 'ÜBER UNS',
            'button_url' => '/about',
            'background_image' => 'slider1.webp',
            'is_active' => true,
            'sort_order' => 2,
        ]);

        HeroSlider::create([
            'title' => 'Vielfältige Bauprojekte',
            'subtitle' => 'Von Wohnkomplexen bis Industrieanlagen',
            'description' => 'Unser Bauunternehmen hat zahlreiche Bauprojekte erfolgreich abgeschlossen, von Ein- und Mehrfamilienhäusern bis hin zu großen Wohnkomplexen.',
            'button_text' => 'PROJEKTE',
            'button_url' => '/projects',
            'background_image' => 'slider2.webp',
            'is_active' => true,
            'sort_order' => 3,
        ]);

        // Create Facts
        FunFact::create([
            'title' => 'Projekte',
            'number' => 150,
            'icon' => 'funfact-project.webp',
            'is_active' => true,
            'sort_order' => 1,
        ]);

        FunFact::create([
            'title' => 'Zufriedene Kunden',
            'number' => 95,
            'icon' => 'funfact-clients.webp',
            'is_active' => true,
            'sort_order' => 2,
        ]);

        FunFact::create([
            'title' => 'Erfolgsrate',
            'number' => 98,
            'icon' => 'funfact-success.webp',
            'is_active' => true,
            'sort_order' => 3,
        ]);

        FunFact::create([
            'title' => 'Jahre Erfahrung',
            'number' => 25,
            'icon' => 'funfact-award.webp',
            'is_active' => true,
            'sort_order' => 4,
        ]);

        // Create Testimonials
        Testimonial::create([
            'name' => 'Herr Müller',
            'designation' => 'Privatkunde',
            'content' => 'VIS GmbH hat unser Wohnhaus pünktlich und in hervorragender Qualität fertiggestellt. Die Zusammenarbeit war sehr professionell und die Kommunikation stets transparent.',
            'image' => '1.webp',
            'is_active' => true,
            'sort_order' => 1,
        ]);

        Testimonial::create([
            'name' => 'Frau Schmidt',
            'designation' => 'Geschäftskundin',
            'content' => 'Bei unserem Gewerbeprojekt hat VIS GmbH alle Erwartungen übertroffen. Termingerechte Fertigstellung und hohe Qualität - absolut empfehlenswert!',
            'image' => '2.webp',
            'is_active' => true,
            'sort_order' => 2,
        ]);

        Testimonial::create([
            'name' => 'Herr Weber',
            'designation' => 'Industriekunde',
            'content' => 'Die industrielle Produktionshalle wurde exakt nach unseren Spezifikationen gebaut. VIS GmbH versteht ihr Handwerk und liefert termingerecht ab.',
            'image' => '3.webp',
            'is_active' => true,
            'sort_order' => 3,
        ]);

        // Create Team Members
        TeamMember::create([
            'name' => 'Fazli Begaj',
            'position' => 'Geschäftsführer',
            'bio' => 'Erfahrener Geschäftsführer mit über 25 Jahren Erfahrung in der Baubranche. Spezialisiert auf Projektmanagement und Kundenbetreuung.',
            'image' => 'team1.webp',
            'email' => 'fazli.begaj@vis-bau.com',
            'phone' => '+49 621 6374820',
            'social_links' => json_encode([
                'linkedin' => 'https://linkedin.com/in/fazli-begaj',
                'facebook' => 'https://facebook.com/visbau'
            ]),
            'is_active' => true,
            'sort_order' => 1,
        ]);

        TeamMember::create([
            'name' => 'Michael Wagner',
            'position' => 'Bauleiter',
            'bio' => 'Erfahrener Bauleiter mit Spezialisierung auf Großprojekte. Koordiniert Teams und sorgt für termingerechte Projektabwicklung.',
            'image' => 'team2.webp',
            'email' => 'michael.wagner@vis-bau.com',
            'phone' => '+49 621 6374821',
            'social_links' => json_encode([
                'linkedin' => 'https://linkedin.com/in/michael-wagner-vis',
                'facebook' => 'https://facebook.com/visbau'
            ]),
            'is_active' => true,
            'sort_order' => 2,
        ]);

        // Create Job Listings
        JobListing::create([
            'title' => 'Bauleiter / Projektmanager',
            'description' => 'Wir suchen einen erfahrenen Bauleiter für anspruchsvolle Bauprojekte. Sie koordinieren Teams, überwachen den Baufortschritt und stellen die Einhaltung von Qualitätsstandards sicher.',
            'location' => 'Mannheim, Deutschland',
            'type' => 'full-time',
            'requirements' => 'Abgeschlossenes Studium im Bauingenieurwesen oder vergleichbare Qualifikation, mehrjährige Berufserfahrung, Führungserfahrung, Deutschkenntnisse.',
            'benefits' => 'Wettbewerbsfähiges Gehalt, Firmenwagen, betriebliche Altersvorsorge, Weiterbildungsmöglichkeiten.',
            'salary_min' => 55000.00,
            'salary_max' => 75000.00,
            'is_active' => true,
            'application_deadline' => now()->addDays(30),
            'sort_order' => 1,
        ]);

        JobListing::create([
            'title' => 'Maurer / Betonbauer',
            'description' => 'Gesucht: Erfahrene Maurer für vielseitige Bauprojekte. Sie führen Maurerarbeiten durch und tragen zur termingerechten Fertigstellung bei.',
            'location' => 'Mannheim und Umgebung',
            'type' => 'full-time',
            'requirements' => 'Abgeschlossene Ausbildung als Maurer, Berufserfahrung, Zuverlässigkeit, körperliche Fitness.',
            'benefits' => 'Gutes Gehalt nach Tarif, Urlaubs- und Weihnachtsgeld, Arbeitskleidung, Aufstiegsmöglichkeiten.',
            'salary_min' => 35000.00,
            'salary_max' => 45000.00,
            'is_active' => true,
            'application_deadline' => now()->addDays(30),
            'sort_order' => 2,
        ]);

        JobListing::create([
            'title' => 'Baumaschinenführer',
            'description' => 'Wir suchen erfahrene Baumaschinenführer für den sicheren und effizienten Einsatz unserer Baumaschinen auf verschiedenen Baustellen.',
            'location' => 'Mannheim, Deutschland',
            'type' => 'full-time',
            'requirements' => 'Führerschein für Baumaschinen, mehrjährige Erfahrung, Sicherheitsbewusstsein, Deutschkenntnisse.',
            'benefits' => 'Attraktives Gehalt, moderne Maschinen, Weiterbildung, sichere Arbeitsplätze.',
            'salary_min' => 38000.00,
            'salary_max' => 48000.00,
            'is_active' => true,
            'application_deadline' => now()->addDays(30),
            'sort_order' => 3,
        ]);

        // Create Brand Logos
        BrandLogo::create([
            'name' => 'HeidelbergCement',
            'logo' => '1.webp',
            'website_url' => 'https://www.heidelbergcement.com',
            'is_active' => true,
            'sort_order' => 1,
        ]);

        BrandLogo::create([
            'name' => 'LafargeHolcim',
            'logo' => '2.webp',
            'website_url' => 'https://www.lafargeholcim.com',
            'is_active' => true,
            'sort_order' => 2,
        ]);

        BrandLogo::create([
            'name' => 'Saint-Gobain',
            'logo' => '3.webp',
            'website_url' => 'https://www.saint-gobain.com',
            'is_active' => true,
            'sort_order' => 3,
        ]);

        BrandLogo::create([
            'name' => 'Knauf',
            'logo' => '4.webp',
            'website_url' => 'https://www.knauf.com',
            'is_active' => true,
            'sort_order' => 4,
        ]);
    }
}
