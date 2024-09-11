<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\frontend\ContactMailRequest;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Mail;

class ContactController extends Controller
{
    function index(){
        return view('frontend.pages.contact');
    }

    function sendMail(ContactMailRequest $request) {
        Mail::to(config('settings.site_email'))->send(new ContactMail($request->name, $request->email, $request->subject, $request->message));

        return response(['message' => 'Message sent successfully'], 200);
    }
}
