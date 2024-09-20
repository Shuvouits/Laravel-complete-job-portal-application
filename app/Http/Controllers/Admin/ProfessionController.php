<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Profession;
use Illuminate\Http\Request;
use App\Traits\Searchable;
use App\Services\Notify;

class ProfessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    Use Searchable;
    public function index()
    {
        $query = Profession::query();
        $this->search($query, ['name']);
        $profession = $query->paginate(10);
        return view('admin.profession.index', compact('profession'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.profession.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255', 'unique:languages,name']
        ]);

        $profession = new Profession();
        $profession->name = $request->name;
        $profession->save();

        Notify::createdNotification();
        return to_route('admin.profession.index');
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
        $profession = Profession::findOrFail($id);

        return view('admin.profession.edit', compact('profession'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'max:255', 'unique:industry_types,name']
        ]);

        $profession = Profession::findOrFail($id);
        $profession->name = $request->name;
        $profession->save();

        Notify::updateNotification();
        return to_route('admin.profession.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

         // validation
         $candidateExist = Candidate::where('profession_id', $id)->exists();

         if($candidateExist) {
             return response(['message' => 'This item is already been used can\'t delete!'], 500);
         }

        try{
            Profession::findOrFail($id)->delete();
            Notify::deletedNotification();
            return response(['message' => 'success'], 200);

        }catch(\Exception $e){
            logger($e);
            return response(['message' => 'Something Went Wrong, Please try again']);

        }
    }
}
