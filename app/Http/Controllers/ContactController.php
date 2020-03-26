<?php

namespace App\Http\Controllers;

use App\Mail\ContactMe;
use Illuminate\Http\Request;
use Mail;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function store()
    {
        request()->validate(['email' => 'required|email']);

        // Using a raw text is great, but we want html
        // Mail::raw('it works', function ($message) {
        //     $message->from('john@johndoe.com', 'John Doe');
        //     $message->sender('john@johndoe.com', 'John Doe');
        //     $message->to(request('email'), 'John Doe')
        //             ->subject('Testing');
        // });

        Mail::to(request('email'))->send(new ContactMe('shirts'));
        // return a message that it was a success
        return redirect('contact')
            ->with('message', 'Email Sent!');
    }
}
