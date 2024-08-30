<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\Job;
use App\Models\JobCategory;
use App\Models\JobType;
use App\Models\State;
use Illuminate\Http\Request;

class FrontendJobPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
        $countries = Country::all();
        $jobCategories = JobCategory::withCount(['jobs' => function($query) {
            $query->where('status', 'active')->where('deadline', '>=', date('Y-m-d'));
        }])->get();

        $jobTypes = JobType::all();
        $selectedStates = null;
        $selectedCites = null;


        $query = Job::query();

        $query->where(['status' => 'active'])
        ->where('deadline', '>=', date('Y-m-d'));

        if($request->has('search') && $request->filled('search')) {
            $query->where('title', 'like', '%'. $request->search . '%');
        }

        if($request->has('country') && $request->filled('country')) {
            $query->where('country_id', $request->country);
        }

        if($request->has('state') && $request->filled('state')) {
            $query->where('state_id', $request->state);
            $selectedStates = State::where('country_id', $request->country)->get();
            $selectedCites = City::where('state_id', $request->state)->get();

        }

        if($request->has('city') && $request->filled('city')) {
            $query->where('city_id', $request->city);
        }

        if($request->has('category') && $request->filled('category')) {
            if(is_array($request->category)){
                $categoryIds = JobCategory::whereIn('slug', $request->category)->pluck('id')->toArray();
                $query->whereIn('job_category_id', $categoryIds);
            }else {
                $category = JobCategory::where('slug', $request->category)->first();
                $query->where('job_category_id', $category->id);
            }
        }
        if($request->has('min_salary') && $request->filled('min_salary') && $request->min_salary > 0) {
            $query->where('min_salary', '>=', $request->min_salary)->orWhere('max_salary', '>=', $request->min_salary);
        }
        if($request->has('jobtype') && $request->filled('jobtype')) {
            $typeIds = JobType::whereIn('slug', $request->jobtype)->pluck('id')->toArray();
            $query->whereIn('job_type_id', $typeIds);
        }


        $jobs = $query->paginate(8);


        return view('frontend.pages.jobs-index', compact('jobs', 'countries', 'jobCategories', 'jobTypes', 'selectedStates', 'selectedCites'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $job = Job::where('slug', $slug)->firstOrFail();
        $openJobs = Job::where('company_id', $job->company->id)->where('status', 'active')->where('deadline', '>=', date('Y-m-d'))->count();
       // $alreadyApplied = ::where(['job_id' => $job->id, 'candidate_id' => auth()->user()?->id])->exists();
       $alreadyApplied = Null;
        return view('frontend.pages.job-show', compact('job', 'openJobs', 'alreadyApplied'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
