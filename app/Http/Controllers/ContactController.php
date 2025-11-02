<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contact()
    {
        return view('frontend.contact');
    }
    /**
     * Store a newly created resource in storage.
     */

    public function sendContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'subject' => 'required|string|max:200',
            'message' => 'required|string',
        ]);
        Contact::create($validated);

        Mail::to('aakritidhungel01@gmail.com')->send(new ContactMail($validated));

        return back()->with('success', 'Thank you for contacting us! We’ll get back soon.');
    }
}
