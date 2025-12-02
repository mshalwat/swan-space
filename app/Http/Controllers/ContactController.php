<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'school' => 'nullable|string|max:255',
            'message' => 'required|string|max:5000',
        ]);
        
        // Log the contact form submission
        Log::info('Contact form submitted', $validated);
        
        // Here you would normally send an email
        // Mail::to('admin@swanspace.com')->send(new ContactFormMail($validated));
        
        return redirect()->back()->with('success', __('contact.success_message'));
    }
}
