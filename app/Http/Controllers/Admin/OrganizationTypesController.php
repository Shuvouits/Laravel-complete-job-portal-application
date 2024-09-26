<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\OrganizationType;
use Illuminate\Http\Request;
use App\Traits\Searchable;
use App\Services\Notify;

class OrganizationTypesController extends Controller
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
        $query = OrganizationType::query();
        $this->search($query, ['name']);
        $organizationTypes = $query->paginate(10);
        return view('admin.organization-type.index', compact('organizationTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.organization-type.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255', 'unique:industry_types,name']
        ]);

        $industry_type = new OrganizationType();
        $industry_type->name = $request->name;
        $industry_type->save();

        Notify::createdNotification();
        return to_route('admin.organization-types.index');
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
        $organizationTypes = OrganizationType::findOrFail($id);

        return view('admin.organization-type.edit', compact('organizationTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'max:255', 'unique:industry_types,name']
        ]);

        $organization_type = OrganizationType::findOrFail($id);
        $organization_type->name = $request->name;
        $organization_type->save();

        Notify::updateNotification();
        return to_route('admin.organization-types.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            OrganizationType::findOrFail($id)->delete();
            Notify::deletedNotification();
            return response(['message' => 'success'], 200);

        }catch(\Exception $e){
            logger($e);
            return response(['message' => 'Something Went Wrong, Please try again']);

        }
    }
}
