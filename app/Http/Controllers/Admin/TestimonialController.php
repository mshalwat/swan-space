<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::orderBy('order')->paginate(20);
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'quote_en' => 'required|string',
            'quote_de' => 'nullable|string',
            'author' => 'required|string|max:255',
            'role_en' => 'required|string|max:255',
            'role_de' => 'nullable|string|max:255',
            'school_en' => 'required|string|max:255',
            'school_de' => 'nullable|string|max:255',
            'avatar' => 'nullable|string|max:255',
            'order' => 'required|integer|min:0',
            'is_active' => 'boolean',
        ]);

        Testimonial::create($validated);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial created successfully.');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $validated = $request->validate([
            'quote_en' => 'required|string',
            'quote_de' => 'nullable|string',
            'author' => 'required|string|max:255',
            'role_en' => 'required|string|max:255',
            'role_de' => 'nullable|string|max:255',
            'school_en' => 'required|string|max:255',
            'school_de' => 'nullable|string|max:255',
            'avatar' => 'nullable|string|max:255',
            'order' => 'required|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $testimonial->update($validated);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial updated successfully.');
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial deleted successfully.');
    }
}
