<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsLetter;
use App\Events\NewsletterSubscribed;

class NewsLetterController extends Controller
{
    public function index() {
        return view('backend.newsletter.index');
    }

    public function subscribe(Request $request) {
        $validated = $request->validate([
            'email' => 'required|email|unique:news_letters,email',
        ]);

        $newsletter = NewsLetter::create([
            'email' => $request->input('email'),
            'ip_address' => $request->ip() 
        ]);

        event( new NewsletterSubscribed($newsletter) );

        return back()->with('message', 'Subscribed Successfully');

    }
}
