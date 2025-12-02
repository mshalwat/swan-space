<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            [
                'quote_en' => "SwanSpace transformed our school's digital presence beyond our expectations. The platform they built is intuitive, beautiful, and has dramatically improved our communication with parents.",
                'quote_de' => 'SwanSpace hat die digitale Präsenz unserer Schule über unsere Erwartungen hinaus transformiert. Die Plattform ist intuitiv, schön und hat unsere Kommunikation mit Eltern dramatisch verbessert.',
                'author' => 'Dr. Maria Schmidt',
                'role_en' => 'Principal',
                'role_de' => 'Schulleiterin',
                'school_en' => 'Swan Schule',
                'school_de' => 'Swan Schule',
                'order' => 1,
            ],
            [
                'quote_en' => 'Working with SwanSpace was a game-changer. Their understanding of educational needs and technical expertise resulted in a solution that truly serves our community.',
                'quote_de' => 'Die Zusammenarbeit mit SwanSpace war bahnbrechend. Ihr Verständnis für Bildungsbedürfnisse und technische Expertise resultierten in einer Lösung, die wirklich unserer Gemeinschaft dient.',
                'author' => 'Thomas Weber',
                'role_en' => 'IT Director',
                'role_de' => 'IT-Leiter',
                'school_en' => 'Gymnasium Berlin',
                'school_de' => 'Gymnasium Berlin',
                'order' => 2,
            ],
            [
                'quote_en' => 'The attention to detail and ongoing support from the SwanSpace team has been exceptional. Our teachers and parents love the new system.',
                'quote_de' => 'Die Liebe zum Detail und der fortlaufende Support vom SwanSpace-Team waren außergewöhnlich. Unsere Lehrer und Eltern lieben das neue System.',
                'author' => 'Sarah Johnson',
                'role_en' => 'Vice Principal',
                'role_de' => 'Stellvertretende Schulleiterin',
                'school_en' => 'International School Munich',
                'school_de' => 'International School Munich',
                'order' => 3,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}
