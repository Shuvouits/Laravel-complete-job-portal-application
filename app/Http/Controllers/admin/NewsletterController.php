<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Mail\NewsletterMail;
use App\Models\Subscriber;
use App\Services\Notify;
use App\Traits\Searchable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NewsletterController extends Controller
{
    use Searchable;

    function __construct()
    {
        $this->middleware(['permission:news letter']);
    }


    function index(){

        $query = Subscriber::query();
        $this->search($query, ['email']);
        $subscribers = $query->orderBy('id', 'DESC')->paginate(20);

        return view('admin.newsletter.index', compact('subscribers'));
    }

    function sendMail(Request $request) {
        $request->validate([
            'subject' => ['required', 'max:255'],
            'message' => ['required']
        ]);

        $subscribers = Subscriber::all();

        foreach ($subscribers as $key => $subscriber) {
            Mail::to($subscriber->email)->send(new NewsletterMail($request->subject, $request->message));
        }

        Notify::successNotification('Newsletter sent successfully!');

        return redirect()->back();
    }

    function destroy(string $id) {
        try {
            Subscriber::findOrFail($id)->delete();
            Notify::deletedNotification();
            return response(['message' => 'success'], 200);

        }catch(\Exception $e) {
            logger($e);
            return response(['message' => 'Something Went Wrong Please Try Again!'], 500);
        }
    }

}
