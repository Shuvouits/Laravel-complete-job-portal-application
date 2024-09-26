<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CandidateSkill;
use App\Models\Job;
use App\Models\JobSkill;
use App\Models\Skill;
use Illuminate\Http\Request;
use App\Traits\Searchable;
use App\Services\Notify;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    Use Searchable;

    function __construct()
    {
        $this->middleware(['permission:job attributes']);
    }

    
    public function index()
    {
        $query = Skill::query();
        $this->search($query, ['name']);
        $skill = $query->paginate(10);
        return view('admin.skill.index', compact('skill'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.skill.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255', 'unique:skills,name']
        ]);

        $skill = new Skill();
        $skill->name = $request->name;
        $skill->save();

        Notify::createdNotification();
        return to_route('admin.skill.index');
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
        $skill = Skill::findOrFail($id);

        return view('admin.skill.edit', compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'max:255', 'unique:skills,name']
        ]);

        $skill = Skill::findOrFail($id);
        $skill->name = $request->name;
        $skill->save();

        Notify::updateNotification();
        return to_route('admin.skill.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

         // validation
         $skillExist = JobSkill::where('skill_id', $id)->exists();
         $candidateSkill = CandidateSkill::where('skill_id', $id)->exists();


         if($skillExist || $candidateSkill) {
             return response(['message' => 'This item is already been used can\'t delete!'], 500);
         }

        try{
            Skill::findOrFail($id)->delete();
            Notify::deletedNotification();
            return response(['message' => 'success'], 200);

        }catch(\Exception $e){
            logger($e);
            return response(['message' => 'Something Went Wrong, Please try again']);

        }
    }
}
