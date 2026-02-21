<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use App\Models\Service;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    // Show the contact page
    public function show()
    {
        $settings = Setting::pluck('value', 'key')->toArray();
        $services = Service::all(['id', 'title', 'slug']);
        return view('frontend.contact', compact('settings', 'services'));
    }

    // Handle form submission
    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'message' => 'required|string',
            'inquiry_service_id' => 'nullable|exists:services,id',
        ]);

        // Save to DB
        $inquiry = Inquiry::create($validated);

        // Get admin email from settings table
        $adminEmail = Setting::first()->email ?? 'muhammadmubashir501681@gmail.com';

        // Send email notification
        Mail::send('emails.inquiry', ['inquiry' => $inquiry], function ($message) use ($inquiry, $adminEmail) {
            $subject = 'New Inquiry from ' . $inquiry->name;
            if ($inquiry->service) {
                $subject .= ' - ' . $inquiry->service->title;
            }

            $message->to($adminEmail)
                ->subject($subject);
        });

        return back()->with('success', '✅ Your inquiry has been submitted successfully!');
    }
}
