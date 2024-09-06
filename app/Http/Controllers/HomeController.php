<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Company;
use App\Models\Counter;
use App\Models\Country;
use App\Models\Hero;
use App\Models\Job;
use App\Models\JobCategory;
use App\Models\JobLocation;
use App\Models\LearnMore;
use App\Models\Plan;
use App\Models\Review;
use App\Models\WhyChooseUs;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Index(){
        $hero = Hero::first();
        $plans = Plan::where(['frontend_show' => 1, 'show_at_home' => 1])->get();
        $jobCategories = JobCategory::all();
        $countries = Country::all();
        return view('frontend.home.index', compact('plans', 'hero','jobCategories', 'countries'));
    }
}
