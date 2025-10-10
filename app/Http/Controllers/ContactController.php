<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage;
use App\Models\BrandLogo;
use App\Models\SectionSetting;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        $data = [];

        // Only load brand logos if section is active
        if (SectionSetting::isSectionActive('brand_logos')) {
            $data['brandLogos'] = BrandLogo::where('is_active', true)
                ->orderBy('sort_order')
                ->get();
        }

        return view('contact', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        $contactMessage = ContactMessage::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
            'subject' => $request->subject,
        ]);

        // Send email notification in background queue
        Mail::to('info@vis-bau.com')->queue(new ContactFormMail($contactMessage));

        return redirect()->back()->with('success', 'Thank you for your message. We will get back to you soon!');
    }
}
