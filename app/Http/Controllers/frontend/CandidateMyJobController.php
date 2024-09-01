<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\AppliedJob;
use Illuminate\Http\Request;

class CandidateMyJobController extends Controller
{
    function index() {
        $appliedJobs = AppliedJob::with('job')->where('candidate_id', auth()->user()->id)->paginate();
        return view('frontend.candidate-dashboard.my-job.index', compact('appliedJobs'));
    }
}
