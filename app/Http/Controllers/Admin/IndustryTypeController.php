<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\IndustryType;
use App\Services\Notify;
use App\Traits\Searchable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class IndustryTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    Use Searchable;

    function __construct()
    {
        $this->middleware(['permission:job attribute']);
    }

    public function index()
    {
        $query = IndustryType::query();
        $this->search($query, ['name']);
        $industryTypes = $query->paginate(10);
        return view('admin.industry-type.index', compact('industryTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.industry-type.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'max:255', 'unique:industry_types,name']
        ]);

        $industry_type = new IndustryType();
        $industry_type->name = $request->name;
        $industry_type->save();

        Notify::createdNotification();
        return to_route('admin.industry-types.index');

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
        $industryTypes = IndustryType::findOrFail($id);

        return view('admin.industry-type.edit', compact('industryTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'max:255', 'unique:industry_types,name']
        ]);

        $industry_type = IndustryType::findOrFail($id);
        $industry_type->name = $request->name;
        $industry_type->save();

        Notify::updateNotification();
        return to_route('admin.industry-types.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

         // validation
         $company = Company::where('skill_id', $id)->exists();

         if($company) {
             return response(['message' => 'This item is already been used can\'t delete!'], 500);
         }

        try{
            IndustryType::findOrFail($id)->delete();
            Notify::deletedNotification();
            return response(['message' => 'success'], 200);

        }catch(\Exception $e){
            logger($e);
            return response(['message' => 'Something Went Wrong, Please try again']);

        }

    }
}
