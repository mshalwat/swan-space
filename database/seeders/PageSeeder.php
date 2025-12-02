<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Page;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        $pages = [
            [
                'title' => 'Home (English)',
                'slug' => 'home-en',
                'content' => $this->homeEnContent(),
            ],
            [
                'title' => 'Startseite (Deutsch)',
                'slug' => 'home-de',
                'content' => $this->homeDeContent(),
            ],
        ];

        foreach ($pages as $data) {
            Page::updateOrCreate(['slug' => $data['slug']], $data);
        }
    }

    private function homeEnContent(): string
    {
        return <<<'HTML'
<!-- Hero Section -->
<section class="relative min-h-screen flex items-center justify-center overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 relative z-10">
        <div class="text-center space-y-8">
            <div class="inline-flex items-center px-4 py-2 rounded-full bg-indigo-500/10 backdrop-blur-sm border border-indigo-500/20">
                <span class="text-sm font-medium text-indigo-600">Digital Education Platform</span>
            </div>
            <h1 class="text-5xl md:text-7xl font-extrabold">
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-indigo-600 to-purple-600">Transform Your</span>
                <br>
                <span class="text-gray-900">Digital Future</span>
            </h1>
            <p class="text-xl md:text-2xl text-gray-600 max-w-3xl mx-auto">
                Empowering schools with innovative digital solutions. Professional consulting, training, and technology integration.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="#contact" class="inline-flex items-center px-8 py-4 rounded-full bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold hover:shadow-xl transition-all">
                    Get Started
                </a>
                <a href="#services" class="inline-flex items-center px-8 py-4 rounded-full border-2 border-indigo-600 text-indigo-600 font-semibold hover:bg-indigo-50 transition-all">
                    Learn More
                </a>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">About SwanSpace</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                We specialize in digital transformation for educational institutions. Our mission is to bridge the gap between traditional education and modern technology.
            </p>
        </div>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="text-center p-6">
                <div class="text-5xl font-bold text-indigo-600 mb-2">150+</div>
                <div class="text-gray-600">Schools Served</div>
            </div>
            <div class="text-center p-6">
                <div class="text-5xl font-bold text-indigo-600 mb-2">98%</div>
                <div class="text-gray-600">Satisfaction Rate</div>
            </div>
            <div class="text-center p-6">
                <div class="text-5xl font-bold text-indigo-600 mb-2">15+</div>
                <div class="text-gray-600">Years Experience</div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Our Services</h2>
            <p class="text-xl text-gray-600">Comprehensive solutions for modern education</p>
        </div>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow">
                <div class="text-4xl mb-4">🎓</div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Digital Consulting</h3>
                <p class="text-gray-600">Strategic guidance for digital transformation in education. We help schools develop comprehensive digital strategies.</p>
            </div>
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow">
                <div class="text-4xl mb-4">💻</div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Technology Training</h3>
                <p class="text-gray-600">Hands-on training programs for educators and staff. Empowering teachers with modern digital tools.</p>
            </div>
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow">
                <div class="text-4xl mb-4">🚀</div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">System Integration</h3>
                <p class="text-gray-600">Seamless integration of educational technology platforms. From LMS to student information systems.</p>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section id="testimonials" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">What Our Clients Say</h2>
            <p class="text-xl text-gray-600">Trusted by educational institutions across the region</p>
        </div>
        <div class="grid md:grid-cols-2 gap-8">
            <div class="bg-gray-50 rounded-2xl p-8">
                <div class="flex items-center mb-4">
                    <div class="flex text-yellow-400">★★★★★</div>
                </div>
                <p class="text-gray-600 mb-4">"SwanSpace transformed our school's digital infrastructure. Their expertise and support have been invaluable."</p>
                <div class="font-semibold text-gray-900">Dr. Maria Schmidt</div>
                <div class="text-gray-600">Principal, Berlin International School</div>
            </div>
            <div class="bg-gray-50 rounded-2xl p-8">
                <div class="flex items-center mb-4">
                    <div class="flex text-yellow-400">★★★★★</div>
                </div>
                <p class="text-gray-600 mb-4">"Professional, knowledgeable, and always available. The training programs exceeded our expectations."</p>
                <div class="font-semibold text-gray-900">Thomas Weber</div>
                <div class="text-gray-600">IT Director, Munich Academy</div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="py-20 bg-gradient-to-br from-indigo-600 to-purple-600">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-white mb-4">Get In Touch</h2>
            <p class="text-xl text-indigo-100">Ready to transform your school's digital future? Let's talk!</p>
        </div>
        <form class="bg-white rounded-2xl p-8 shadow-2xl space-y-6">
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Name</label>
                    <input type="text" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-600 focus:border-transparent" placeholder="Your name">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                    <input type="email" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-600 focus:border-transparent" placeholder="your@email.com">
                </div>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">School/Organization</label>
                <input type="text" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-600 focus:border-transparent" placeholder="Your institution">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Message</label>
                <textarea rows="4" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-600 focus:border-transparent" placeholder="Tell us about your needs..."></textarea>
            </div>
            <button type="submit" class="w-full bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold py-4 rounded-lg hover:shadow-xl transition-all">
                Send Message
            </button>
        </form>
    </div>
</section>
HTML;
    }

    private function homeDeContent(): string
    {
        return <<<'HTML'
<!-- Hero Bereich -->
<section class="relative min-h-screen flex items-center justify-center overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 relative z-10">
        <div class="text-center space-y-8">
            <div class="inline-flex items-center px-4 py-2 rounded-full bg-indigo-500/10 backdrop-blur-sm border border-indigo-500/20">
                <span class="text-sm font-medium text-indigo-600">Digitale Bildungsplattform</span>
            </div>
            <h1 class="text-5xl md:text-7xl font-extrabold">
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-indigo-600 to-purple-600">Gestalten Sie Ihre</span>
                <br>
                <span class="text-gray-900">Digitale Zukunft</span>
            </h1>
            <p class="text-xl md:text-2xl text-gray-600 max-w-3xl mx-auto">
                Wir unterstützen Schulen mit innovativen digitalen Lösungen. Professionelle Beratung, Schulungen und Technologieintegration.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="#contact" class="inline-flex items-center px-8 py-4 rounded-full bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold hover:shadow-xl transition-all">
                    Jetzt Starten
                </a>
                <a href="#services" class="inline-flex items-center px-8 py-4 rounded-full border-2 border-indigo-600 text-indigo-600 font-semibold hover:bg-indigo-50 transition-all">
                    Mehr Erfahren
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Über Uns Bereich -->
<section id="about" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Über SwanSpace</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Wir sind spezialisiert auf die digitale Transformation von Bildungseinrichtungen. Unsere Mission ist es, die Lücke zwischen traditioneller Bildung und moderner Technologie zu schließen.
            </p>
        </div>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="text-center p-6">
                <div class="text-5xl font-bold text-indigo-600 mb-2">150+</div>
                <div class="text-gray-600">Betreute Schulen</div>
            </div>
            <div class="text-center p-6">
                <div class="text-5xl font-bold text-indigo-600 mb-2">98%</div>
                <div class="text-gray-600">Zufriedenheitsrate</div>
            </div>
            <div class="text-center p-6">
                <div class="text-5xl font-bold text-indigo-600 mb-2">15+</div>
                <div class="text-gray-600">Jahre Erfahrung</div>
            </div>
        </div>
    </div>
</section>

<!-- Dienstleistungen Bereich -->
<section id="services" class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Unsere Dienstleistungen</h2>
            <p class="text-xl text-gray-600">Umfassende Lösungen für moderne Bildung</p>
        </div>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow">
                <div class="text-4xl mb-4">🎓</div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Digitale Beratung</h3>
                <p class="text-gray-600">Strategische Beratung für die digitale Transformation im Bildungswesen. Wir helfen Schulen, umfassende digitale Strategien zu entwickeln.</p>
            </div>
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow">
                <div class="text-4xl mb-4">💻</div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Technologie-Schulung</h3>
                <p class="text-gray-600">Praktische Schulungsprogramme für Lehrkräfte und Personal. Wir befähigen Lehrer mit modernen digitalen Werkzeugen.</p>
            </div>
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow">
                <div class="text-4xl mb-4">🚀</div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Systemintegration</h3>
                <p class="text-gray-600">Nahtlose Integration von Bildungstechnologie-Plattformen. Von LMS bis zu Schülerinformationssystemen.</p>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Bereich -->
<section id="testimonials" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Was Unsere Kunden Sagen</h2>
            <p class="text-xl text-gray-600">Vertrauen von Bildungseinrichtungen in der ganzen Region</p>
        </div>
        <div class="grid md:grid-cols-2 gap-8">
            <div class="bg-gray-50 rounded-2xl p-8">
                <div class="flex items-center mb-4">
                    <div class="flex text-yellow-400">★★★★★</div>
                </div>
                <p class="text-gray-600 mb-4">"SwanSpace hat die digitale Infrastruktur unserer Schule transformiert. Ihre Expertise und Unterstützung waren von unschätzbarem Wert."</p>
                <div class="font-semibold text-gray-900">Dr. Maria Schmidt</div>
                <div class="text-gray-600">Schulleiterin, Berlin International School</div>
            </div>
            <div class="bg-gray-50 rounded-2xl p-8">
                <div class="flex items-center mb-4">
                    <div class="flex text-yellow-400">★★★★★</div>
                </div>
                <p class="text-gray-600 mb-4">"Professionell, kompetent und immer verfügbar. Die Schulungsprogramme haben unsere Erwartungen übertroffen."</p>
                <div class="font-semibold text-gray-900">Thomas Weber</div>
                <div class="text-gray-600">IT-Leiter, München Akademie</div>
            </div>
        </div>
    </div>
</section>

<!-- Kontakt Bereich -->
<section id="contact" class="py-20 bg-gradient-to-br from-indigo-600 to-purple-600">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-white mb-4">Kontaktieren Sie Uns</h2>
            <p class="text-xl text-indigo-100">Bereit, die digitale Zukunft Ihrer Schule zu gestalten? Lassen Sie uns reden!</p>
        </div>
        <form class="bg-white rounded-2xl p-8 shadow-2xl space-y-6">
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Name</label>
                    <input type="text" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-600 focus:border-transparent" placeholder="Ihr Name">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">E-Mail</label>
                    <input type="email" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-600 focus:border-transparent" placeholder="ihre@email.de">
                </div>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Schule/Organisation</label>
                <input type="text" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-600 focus:border-transparent" placeholder="Ihre Einrichtung">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Nachricht</label>
                <textarea rows="4" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-600 focus:border-transparent" placeholder="Erzählen Sie uns von Ihren Bedürfnissen..."></textarea>
            </div>
            <button type="submit" class="w-full bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold py-4 rounded-lg hover:shadow-xl transition-all">
                Nachricht Senden
            </button>
        </form>
    </div>
</section>
HTML;
    }
}
