<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    function store(Request $request) {
        $request->validate([
            'email' => ['required', 'email', 'unique:subscribers,email']
        ]);

        $subscribe = new Subscriber();
        $subscribe->email = $request->email;
        $subscribe->save();

        return response(['message' => 'Subscribed Successfully.']);

    }
}
