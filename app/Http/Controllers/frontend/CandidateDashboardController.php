<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\AppliedJob;
use App\Models\JobBookMark;
use Illuminate\Http\Request;


class CandidateDashboardController extends Controller
{


    //
    public function index()
    {
        $appliedJobs = AppliedJob::with('job')->where('candidate_id', auth()->user()->id)->orderBy('id', 'DESC')->take(10)->get();

        $jobAppliedCount = AppliedJob::where('candidate_id', auth()->user()->id)->count();
        $userBookmarksCount = JobBookMark::where('candidate_id', auth()->user()->candidateProfile?->id)->count();

        return view('frontend.candidate-dashboard.dashboard', compact('appliedJobs', 'jobAppliedCount', 'userBookmarksCount'));
    }
}
