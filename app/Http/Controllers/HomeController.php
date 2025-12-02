<?php

namespace App\Http\Controllers;

use App\Models\ContentSection;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return redirect()->route('home.en');
    }

    public function english()
    {
        // Fetch content from database for English
        $hero = ContentSection::getBySectionAndLanguage('hero', 'en');
        $about = ContentSection::getBySectionAndLanguage('about', 'en');
        $servicesSection = ContentSection::getBySectionAndLanguage('services', 'en');
        $statsSection = ContentSection::getBySectionAndLanguage('stats', 'en');
        $highlightsSection = ContentSection::getBySectionAndLanguage('highlights', 'en');
        $contactSection = ContentSection::getBySectionAndLanguage('contact', 'en');

        // Format hero content
        $heroContent = [
            'badge' => $hero?->badge ?? 'Digital Innovation for Education',
            'title' => $hero?->title ?? 'Transform Your School into a',
            'title_highlight' => $hero?->subtitle ?? 'Digital Universe',
            'description' => $hero?->description ?? 'Experience cutting-edge digital solutions.',
        ];

        // Format about content
        $aboutContent = [
            'badge' => $about?->badge ?? 'About SwanSpace',
            'title' => $about?->title ?? 'Innovation Meets',
            'title_highlight' => $about?->subtitle ?? 'Education',
            'description' => $about?->description ?? 'We are pioneers in digital transformation.',
        ];

        // Format services content
        $servicesContent = [
            'badge' => $servicesSection?->badge ?? 'Our Services',
            'title' => $servicesSection?->title ?? 'Comprehensive Digital',
            'title_highlight' => $servicesSection?->subtitle ?? 'Solutions',
            'description' => $servicesSection?->description ?? 'From custom development to complete digital ecosystems.',
        ];

        // Format contact content
        $contactContent = [
            'badge' => $contactSection?->badge ?? 'Get In Touch',
            'title' => $contactSection?->title ?? "Let's Start Your",
            'title_highlight' => $contactSection?->subtitle ?? 'Digital Journey',
        ];

        // Format stats from JSON data
        $statsData = $statsSection?->data ?? [];
        $stats = [
            ['count' => $statsData['stat_1_count'] ?? '150+', 'label' => $statsData['stat_1_label'] ?? 'Schools Served'],
            ['count' => $statsData['stat_2_count'] ?? '98%', 'label' => $statsData['stat_2_label'] ?? 'Satisfaction Rate'],
            ['count' => $statsData['stat_3_count'] ?? '15+', 'label' => $statsData['stat_3_label'] ?? 'Years Experience'],
        ];

        // Format highlights from JSON data
        $highlightsData = $highlightsSection?->data ?? [];
        $highlights = array_values(array_filter([
            $highlightsData['highlight_1'] ?? 'Cutting-edge technology stack',
            $highlightsData['highlight_2'] ?? 'Tailored solutions for education',
            $highlightsData['highlight_3'] ?? 'Expert support and training',
            $highlightsData['highlight_4'] ?? 'Scalable and secure platforms',
        ]));

        $services = Service::all();
        $testimonials = Testimonial::all();

        return view('welcome', compact('heroContent', 'aboutContent', 'servicesContent', 'contactContent', 'stats', 'highlights', 'services', 'testimonials'));
    }

    public function german()
    {
        // Fetch content from database for German
        $hero = ContentSection::getBySectionAndLanguage('hero', 'de');
        $about = ContentSection::getBySectionAndLanguage('about', 'de');
        $servicesSection = ContentSection::getBySectionAndLanguage('services', 'de');
        $statsSection = ContentSection::getBySectionAndLanguage('stats', 'de');
        $highlightsSection = ContentSection::getBySectionAndLanguage('highlights', 'de');
        $contactSection = ContentSection::getBySectionAndLanguage('contact', 'de');

        // Format hero content
        $heroContent = [
            'badge' => $hero?->badge ?? 'Digitale Innovation für Bildung',
            'title' => $hero?->title ?? 'Verwandeln Sie Ihre Schule in ein',
            'title_highlight' => $hero?->subtitle ?? 'Digitales Universum',
            'description' => $hero?->description ?? 'Erleben Sie modernste digitale Lösungen.',
        ];

        // Format about content
        $aboutContent = [
            'badge' => $about?->badge ?? 'Über SwanSpace',
            'title' => $about?->title ?? 'Innovation trifft',
            'title_highlight' => $about?->subtitle ?? 'Bildung',
            'description' => $about?->description ?? 'Wir sind Pioniere in der digitalen Transformation.',
        ];

        // Format services content
        $servicesContent = [
            'badge' => $servicesSection?->badge ?? 'Unsere Dienstleistungen',
            'title' => $servicesSection?->title ?? 'Umfassende Digitale',
            'title_highlight' => $servicesSection?->subtitle ?? 'Lösungen',
            'description' => $servicesSection?->description ?? 'Von maßgeschneiderter Entwicklung bis hin zu kompletten digitalen Ökosystemen.',
        ];

        // Format contact content
        $contactContent = [
            'badge' => $contactSection?->badge ?? 'Kontakt aufnehmen',
            'title' => $contactSection?->title ?? 'Beginnen Sie Ihre',
            'title_highlight' => $contactSection?->subtitle ?? 'Digitale Reise',
        ];

        // Format stats from JSON data
        $statsData = $statsSection?->data ?? [];
        $stats = [
            ['count' => $statsData['stat_1_count'] ?? '150+', 'label' => $statsData['stat_1_label'] ?? 'Betreute Schulen'],
            ['count' => $statsData['stat_2_count'] ?? '98%', 'label' => $statsData['stat_2_label'] ?? 'Zufriedenheitsrate'],
            ['count' => $statsData['stat_3_count'] ?? '15+', 'label' => $statsData['stat_3_label'] ?? 'Jahre Erfahrung'],
        ];

        // Format highlights from JSON data
        $highlightsData = $highlightsSection?->data ?? [];
        $highlights = array_values(array_filter([
            $highlightsData['highlight_1'] ?? 'Modernste Technologie-Stack',
            $highlightsData['highlight_2'] ?? 'Maßgeschneiderte Lösungen für Bildung',
            $highlightsData['highlight_3'] ?? 'Expertenunterstützung und Schulung',
            $highlightsData['highlight_4'] ?? 'Skalierbare und sichere Plattformen',
        ]));

        $services = Service::all();
        $testimonials = Testimonial::all();

        return view('welcome-de', compact('heroContent', 'aboutContent', 'servicesContent', 'contactContent', 'stats', 'highlights', 'services', 'testimonials'));
    }
}
