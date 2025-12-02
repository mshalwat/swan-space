<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageContent;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\CaseStudy;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'page_contents' => PageContent::count(),
            'services' => Service::count(),
            'testimonials' => Testimonial::count(),
            'case_studies' => CaseStudy::count(),
        ];
        
        return view('admin.dashboard', compact('stats'));
    }
}
