<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Blog;
use App\Models\Review;
use Illuminate\Http\Request;

class AboutUsPageController extends Controller
{
    function index() {
        $about = About::first();
        $reviews = Review::latest()->take(10)->get();
        $blogs = Blog::latest()->take(6)->get();
        return view('frontend.pages.about-us', compact('about', 'reviews', 'blogs'));
    }
}
