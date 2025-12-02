<?php

namespace Database\Seeders;

use App\Models\PageContent;
use Illuminate\Database\Seeder;

class PageContentSeeder extends Seeder
{
    public function run(): void
    {
        $contents = [
            // Hero Section
            ['section' => 'hero', 'key' => 'badge', 'value_en' => '✨ Digital Solutions for Modern Education', 'value_de' => '✨ Digitale Lösungen für moderne Bildung', 'order' => 1],
            ['section' => 'hero', 'key' => 'title', 'value_en' => 'Empowering Schools Through', 'value_de' => 'Schulen stärken durch', 'order' => 2],
            ['section' => 'hero', 'key' => 'title_highlight', 'value_en' => 'Smart Digital Solutions', 'value_de' => 'Intelligente digitale Lösungen', 'order' => 3],
            ['section' => 'hero', 'key' => 'description', 'value_en' => 'We transform educational institutions with innovative web solutions, helping schools connect with students, parents, and communities in the digital age.', 'value_de' => 'Wir transformieren Bildungseinrichtungen mit innovativen Web-Lösungen und helfen Schulen, sich mit Schülern, Eltern und der Gemeinschaft im digitalen Zeitalter zu verbinden.', 'order' => 4],
            
            // About Section
            ['section' => 'about', 'key' => 'badge', 'value_en' => 'About SwanSpace', 'value_de' => 'Über SwanSpace', 'order' => 1],
            ['section' => 'about', 'key' => 'title', 'value_en' => "We're Part of the", 'value_de' => 'Wir sind Teil der', 'order' => 2],
            ['section' => 'about', 'key' => 'title_highlight', 'value_en' => 'Swan Schule Family', 'value_de' => 'Swan Schule Familie', 'order' => 3],
            ['section' => 'about', 'key' => 'description', 'value_en' => "Born from our experience building digital solutions for Swan Schule, SwanSpace emerged to help other educational institutions embrace the digital transformation. We understand the unique challenges schools face because we've lived them firsthand.", 'value_de' => 'Entstanden aus unserer Erfahrung beim Aufbau digitaler Lösungen für die Swan Schule, hat sich SwanSpace entwickelt, um anderen Bildungseinrichtungen bei der digitalen Transformation zu helfen. Wir verstehen die einzigartigen Herausforderungen von Schulen, weil wir sie selbst erlebt haben.', 'order' => 4],
            
            // Services Section
            ['section' => 'services', 'key' => 'badge', 'value_en' => 'Our Services', 'value_de' => 'Unsere Dienstleistungen', 'order' => 1],
            ['section' => 'services', 'key' => 'title', 'value_en' => 'Comprehensive Digital Solutions for', 'value_de' => 'Umfassende digitale Lösungen für', 'order' => 2],
            ['section' => 'services', 'key' => 'title_highlight', 'value_en' => 'Modern Schools', 'value_de' => 'Moderne Schulen', 'order' => 3],
            
            // Contact Section
            ['section' => 'contact', 'key' => 'badge', 'value_en' => 'Get In Touch', 'value_de' => 'Kontakt aufnehmen', 'order' => 1],
            ['section' => 'contact', 'key' => 'title', 'value_en' => 'Partner with us to', 'value_de' => 'Werden Sie Partner, um', 'order' => 2],
            ['section' => 'contact', 'key' => 'title_highlight', 'value_en' => 'modernize your school', 'value_de' => 'Ihre Schule zu modernisieren', 'order' => 3],
            
            // Stats
            ['section' => 'stats', 'key' => 'schools_count', 'value_en' => '50+', 'value_de' => '50+', 'order' => 1],
            ['section' => 'stats', 'key' => 'schools_label', 'value_en' => 'Schools Transformed', 'value_de' => 'Transformierte Schulen', 'order' => 2],
            ['section' => 'stats', 'key' => 'satisfaction_count', 'value_en' => '98%', 'value_de' => '98%', 'order' => 3],
            ['section' => 'stats', 'key' => 'satisfaction_label', 'value_en' => 'Client Satisfaction', 'value_de' => 'Kundenzufriedenheit', 'order' => 4],
            ['section' => 'stats', 'key' => 'experience_count', 'value_en' => '5+', 'value_de' => '5+', 'order' => 5],
            ['section' => 'stats', 'key' => 'experience_label', 'value_en' => 'Years Experience', 'value_de' => 'Jahre Erfahrung', 'order' => 6],
        ];

        foreach ($contents as $content) {
            PageContent::create($content);
        }
    }
}
