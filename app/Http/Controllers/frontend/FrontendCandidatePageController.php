<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Experience;
use App\Models\Skill;
use Illuminate\Http\Request;

class FrontendCandidatePageController extends Controller
{

    function index(Request $request){

        $skills = Skill::all();
        $experiences = Experience::all();
        $query = Candidate::query();
        $query->where(['profile_complete' => 1, 'visibility' => 1]);

        if($request->has('skills') && $request->filled('skills')) {
            $ids = Skill::whereIn('slug', $request->skills)->pluck('id')->toArray();
            $query->whereHas('skills', function($subquery) use ($ids) {
                $subquery->whereIn('skill_id', $ids);
            });
        }
        if($request->has('experience') && $request->filled('experience')) {
           $query->where('experience_id', $request->experience);
        }

        $candidates = $query->paginate(24);


        return view('frontend.pages.candidate-index', compact('candidates', 'skills', 'experiences'));
    }

    function show(string $slug){
        $candidate = Candidate::where(['profile_complete' => 1, 'visibility' => 1, 'slug' => $slug])->firstOrFail();
        return view('frontend.pages.candidate-details', compact('candidate'));
    }


}
