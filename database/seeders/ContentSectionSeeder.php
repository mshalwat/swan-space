<?php

namespace Database\Seeders;

use App\Models\ContentSection;
use Illuminate\Database\Seeder;

class ContentSectionSeeder extends Seeder
{
    public function run(): void
    {
        $sections = [
            // English Hero Section
            [
                'section_key' => 'hero_en',
                'language' => 'en',
                'section_type' => 'hero',
                'badge' => '✨ Digital Solutions for Modern Education',
                'title' => 'Empowering Schools Through',
                'subtitle' => 'Smart Digital Solutions',
                'description' => 'We transform educational institutions with innovative web solutions, helping schools connect with students, parents, and communities in the digital age.',
                'is_active' => true,
                'order' => 1,
            ],

            // German Hero Section
            [
                'section_key' => 'hero_de',
                'language' => 'de',
                'section_type' => 'hero',
                'badge' => '✨ Digitale Lösungen für moderne Bildung',
                'title' => 'Schulen stärken durch',
                'subtitle' => 'Intelligente digitale Lösungen',
                'description' => 'Wir transformieren Bildungseinrichtungen mit innovativen Web-Lösungen und helfen Schulen, sich mit Schülern, Eltern und der Gemeinschaft im digitalen Zeitalter zu verbinden.',
                'is_active' => true,
                'order' => 1,
            ],

            // English About Section
            [
                'section_key' => 'about_en',
                'language' => 'en',
                'section_type' => 'about',
                'badge' => 'About SwanSpace',
                'title' => "We're Part of the",
                'subtitle' => 'Swan Schule Family',
                'description' => "Born from our experience building digital solutions for Swan Schule, SwanSpace emerged to help other educational institutions embrace the digital transformation. We understand the unique challenges schools face because we've lived them firsthand.",
                'is_active' => true,
                'order' => 2,
            ],

            // German About Section
            [
                'section_key' => 'about_de',
                'language' => 'de',
                'section_type' => 'about',
                'badge' => 'Über SwanSpace',
                'title' => 'Wir sind Teil der',
                'subtitle' => 'Swan Schule Familie',
                'description' => 'Entstanden aus unserer Erfahrung beim Aufbau digitaler Lösungen für die Swan Schule, hat sich SwanSpace entwickelt, um anderen Bildungseinrichtungen bei der digitalen Transformation zu helfen. Wir verstehen die einzigartigen Herausforderungen von Schulen, weil wir sie selbst erlebt haben.',
                'is_active' => true,
                'order' => 2,
            ],

            // English Services Section
            [
                'section_key' => 'services_en',
                'language' => 'en',
                'section_type' => 'services',
                'badge' => 'Our Services',
                'title' => 'Comprehensive Digital Solutions for',
                'subtitle' => 'Modern Schools',
                'description' => 'From initial consultation to ongoing support, we provide everything you need to succeed in the digital age.',
                'is_active' => true,
                'order' => 3,
            ],

            // German Services Section
            [
                'section_key' => 'services_de',
                'language' => 'de',
                'section_type' => 'services',
                'badge' => 'Unsere Dienstleistungen',
                'title' => 'Umfassende digitale Lösungen für',
                'subtitle' => 'Moderne Schulen',
                'description' => 'Von der ersten Beratung bis zum fortlaufenden Support bieten wir alles, was Sie für den Erfolg im digitalen Zeitalter benötigen.',
                'is_active' => true,
                'order' => 3,
            ],

            // English Stats
            [
                'section_key' => 'stats_en',
                'language' => 'en',
                'section_type' => 'stats',
                'data' => [
                    'stat_1_count' => '50+',
                    'stat_1_label' => 'Schools Transformed',
                    'stat_2_count' => '98%',
                    'stat_2_label' => 'Client Satisfaction',
                    'stat_3_count' => '5+',
                    'stat_3_label' => 'Years Experience',
                ],
                'is_active' => true,
                'order' => 4,
            ],

            // German Stats
            [
                'section_key' => 'stats_de',
                'language' => 'de',
                'section_type' => 'stats',
                'data' => [
                    'stat_1_count' => '50+',
                    'stat_1_label' => 'Transformierte Schulen',
                    'stat_2_count' => '98%',
                    'stat_2_label' => 'Kundenzufriedenheit',
                    'stat_3_count' => '5+',
                    'stat_3_label' => 'Jahre Erfahrung',
                ],
                'is_active' => true,
                'order' => 4,
            ],

            // English Highlights
            [
                'section_key' => 'highlights_en',
                'language' => 'en',
                'section_type' => 'highlights',
                'data' => [
                    'highlight_1' => 'Cutting-edge technology stack',
                    'highlight_2' => 'Tailored solutions for education',
                    'highlight_3' => 'Expert support and training',
                    'highlight_4' => 'Scalable and secure platforms',
                ],
                'is_active' => true,
                'order' => 5,
            ],

            // German Highlights
            [
                'section_key' => 'highlights_de',
                'language' => 'de',
                'section_type' => 'highlights',
                'data' => [
                    'highlight_1' => 'Modernste Technologie-Stack',
                    'highlight_2' => 'Maßgeschneiderte Lösungen für Bildung',
                    'highlight_3' => 'Expertenunterstützung und Schulung',
                    'highlight_4' => 'Skalierbare und sichere Plattformen',
                ],
                'is_active' => true,
                'order' => 5,
            ],

            // English Contact Section
            [
                'section_key' => 'contact_en',
                'language' => 'en',
                'section_type' => 'contact',
                'badge' => 'Get In Touch',
                'title' => "Let's Start Your",
                'subtitle' => 'Digital Journey',
                'is_active' => true,
                'order' => 6,
            ],

            // German Contact Section
            [
                'section_key' => 'contact_de',
                'language' => 'de',
                'section_type' => 'contact',
                'badge' => 'Kontakt aufnehmen',
                'title' => 'Beginnen Sie Ihre',
                'subtitle' => 'Digitale Reise',
                'is_active' => true,
                'order' => 6,
            ],
        ];

        foreach ($sections as $section) {
            ContentSection::updateOrCreate(
                ['section_key' => $section['section_key']],
                $section
            );
        }
    }
}
