<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\frontend\CandidateExperienceRequest;
use App\Models\Candidate;
use App\Models\CandidateExperience;
use App\Models\User;
use Illuminate\Http\Request;

class CandidateExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $candidateData = CandidateExperience::where('candidates_id', auth()->user()->candidateProfile->id)->get();
        return response()->json($candidateData);
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
    public function store(CandidateExperienceRequest $request)
    {


        $candidate_experience = new CandidateExperience();

        $candidate_experience->company = $request->company;
        $candidate_experience->candidates_id = auth()->user()->candidateProfile->id;
        $candidate_experience->department = $request->department;
        $candidate_experience->designation = $request->designation;
        $candidate_experience->start = $request->start;
        $candidate_experience->end = $request->end;
        $candidate_experience->current_working = $request->currently_working;

        if($request->currently_working == null){
            $candidate_experience->current_working = 0;

        }
        $candidate_experience->responsiblities = $request->responsiblities;
        $candidate_experience->save();
        return response()->json(['message' => 'Data inserted successfully']);


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(CandidateExperienceRequest $request, string $id)
    {


        $candidate_experience = CandidateExperience::findOrFail($id);
        $candidate_experience->company = $request->company;
        $candidate_experience->candidates_id = auth()->user()->candidateProfile->id;
        $candidate_experience->department = $request->department;
        $candidate_experience->designation = $request->designation;
        $candidate_experience->start = $request->start;
        $candidate_experience->end = $request->end;
        $candidate_experience->current_working = $request->currently_working;

        if($request->currently_working == null){
            $candidate_experience->current_working = 0;

        }
        $candidate_experience->responsiblities = $request->responsiblities;
        $candidate_experience->save();
       // return response()->json(['message', 'Data Updated successfully']);
        return response()->json(['message' => 'Data Updated successfully']);



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $experience = CandidateExperience::findOrFail($id);
        $experience->delete();

        return response()->json(['success' => 'Experience deleted successfully']);
    }
}
