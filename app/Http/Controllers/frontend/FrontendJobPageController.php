<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Job;
use App\Models\JobCategory;
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


        $query = Job::query();

        $query->where(['status' => 'active'])
        ->where('deadline', '>=', date('Y-m-d'));

        if($request->has('search') && $request->filled('search')) {
            $query->where('title', 'like', '%'. $request->search . '%');
        }


        $jobs = $query->get();



        return view('frontend.pages.jobs-index', compact('jobs','countries', 'jobCategories'));
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
