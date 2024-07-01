<?php

namespace App\Http\Controllers\candidate;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\CandidateEducation;
use Illuminate\Http\Request;

class CandidatePageController extends Controller
{
    public function Candidate(){
        $all_candidate = Candidate::where(['profile_complete' => '1', 'visiblity' => '1'])->with('skills')->get();
        return view('frontend.candidate.all_candidate', compact('all_candidate'));
    }

    public function CandidateDetails($slug){
        $candidate_data = Candidate::where(['profile_complete' => '1', 'visiblity' => '1', 'slug' => $slug])->with('candidateExperiences','profession','languages','skills',)->firstOrFail();
        $candidate_education = CandidateEducation::where('candidates_id', $candidate_data->id)->get();

        return view('frontend.candidate.candidate_details', compact('candidate_data', 'candidate_education'));
    }
}
