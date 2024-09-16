<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Company;
use App\Models\Counter;
use App\Models\Country;
use App\Models\CustomPageBuilder;
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

        $jobCategories = JobCategory::all();
        $popularJobCategories = JobCategory::withCount(['jobs' => function ($query) {
            $query->where(['status' => 'active'])
                ->where('deadline', '>=', date('Y-m-d'));
        }])->where('show_at_popular', 1)->get();

        $jobCount = Job::count();

        $featuredCategories = JobCategory::where('show_at_featured', 1)->take(10)->get();
        $whyChooseUs = WhyChooseUs::first();

        $counter = Counter::first();

        $companies = Company::with('companyCountry', 'jobs')->select('id', 'logo', 'name', 'slug', 'country', 'profile_completion', 'visibility')->withCount(['jobs' => function ($query) {
            $query->where(['status' => 'active'])
                ->where('deadline', '>=', date('Y-m-d'));
        }])->where(['profile_completion' => 1, 'visibility' => 1])->latest()->take(45)->get();

        $locations = JobLocation::latest()->take(8)->get();
        $reviews = Review::latest()->take(10)->get();

        $blogs = Blog::latest()->take(6)->get();

       
        return view('frontend.home.index', compact('plans', 'hero','jobCategories', 'countries', 'popularJobCategories', 'jobCount', 'featuredCategories', 'whyChooseUs', 'counter', 'companies', 'locations', 'reviews', 'blogs'));
    }

    function customPage(string $slug){
        $page = CustomPageBuilder::where('slug', $slug)->firstOrFail();

        return view('frontend.pages.custom-page', compact('page'));
    }


}
