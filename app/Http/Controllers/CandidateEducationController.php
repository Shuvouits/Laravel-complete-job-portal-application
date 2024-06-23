<?php

namespace App\Http\Controllers;

use App\Http\Requests\frontend\CandidateEducationRequest;
use App\Models\CandidateEducation;
use Illuminate\Http\Request;

class CandidateEducationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $candidateData = CandidateEducation::where('candidates_id', auth()->user()->candidateProfile->id)->get();
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
    public function store(CandidateEducationRequest $request)
    {
        $candidate_education = new CandidateEducation();
        $candidate_education->candidates_id = auth()->user()->candidateProfile->id;
        $candidate_education->level = $request->level;
        $candidate_education->degree = $request->degree;
        $candidate_education->start = $request->start;
        $candidate_education->end = $request->end;
        $candidate_education->note = $request->note;
        $candidate_education->save();
        return response()->json(['message' => 'Data Insert Successfully']);

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
    public function update(Request $request, string $id)
    {
        $candidate_education = CandidateEducation::findOrFail($id);
        $candidate_education->candidates_id = auth()->user()->candidateProfile->id;
        $candidate_education->level = $request->level;
        $candidate_education->degree = $request->degree;
        $candidate_education->start = $request->start;
        $candidate_education->end = $request->end;
        $candidate_education->note = $request->note;
        $candidate_education->save();
        return response()->json(['message' => 'Data Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $education = CandidateEducation::findOrFail($id);
        $education->delete();

        return response()->json(['success' => 'Education deleted successfully']);
    }
}
