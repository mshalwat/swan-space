<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'icon' => 'globe',
                'title_en' => 'Website Development',
                'title_de' => 'Website-Entwicklung',
                'description_en' => "Modern, responsive websites that showcase your school's unique identity and values to the world.",
                'description_de' => 'Moderne, responsive Websites, die die einzigartige Identität und Werte Ihrer Schule der Welt präsentieren.',
                'order' => 1,
            ],
            [
                'icon' => 'smartphone',
                'title_en' => 'Mobile-First Design',
                'title_de' => 'Mobile-First Design',
                'description_en' => 'Beautiful, user-friendly interfaces optimized for every device, ensuring accessibility for all stakeholders.',
                'description_de' => 'Schöne, benutzerfreundliche Oberflächen, optimiert für jedes Gerät und Barrierefreiheit für alle Beteiligten.',
                'order' => 2,
            ],
            [
                'icon' => 'database',
                'title_en' => 'School Management Systems',
                'title_de' => 'Schulverwaltungssysteme',
                'description_en' => 'Comprehensive digital platforms to streamline administration, communication, and daily operations.',
                'description_de' => 'Umfassende digitale Plattformen zur Optimierung von Verwaltung, Kommunikation und täglichen Abläufen.',
                'order' => 3,
            ],
            [
                'icon' => 'line-chart',
                'title_en' => 'Digital Transformation',
                'title_de' => 'Digitale Transformation',
                'description_en' => "Strategic guidance to modernize your institution's digital presence and workflows.",
                'description_de' => 'Strategische Beratung zur Modernisierung der digitalen Präsenz und Arbeitsabläufe Ihrer Institution.',
                'order' => 4,
            ],
            [
                'icon' => 'settings',
                'title_en' => 'Custom Integrations',
                'title_de' => 'Individuelle Integrationen',
                'description_en' => 'Seamless connections between your existing tools and new digital solutions.',
                'description_de' => 'Nahtlose Verbindungen zwischen Ihren vorhandenen Tools und neuen digitalen Lösungen.',
                'order' => 5,
            ],
            [
                'icon' => 'users',
                'title_en' => 'Training & Support',
                'title_de' => 'Schulung & Support',
                'description_en' => "Comprehensive onboarding and ongoing assistance to ensure your team's success.",
                'description_de' => 'Umfassendes Onboarding und fortlaufende Unterstützung für den Erfolg Ihres Teams.',
                'order' => 6,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
