<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Traits\Searchable;
use App\Services\Notify;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    Use Searchable;
    public function index()
    {
        $query = Country::query();
        $this->search($query, ['name']);
        $countries = $query->orderBy('id','DESC')->paginate(10);
        return view('admin.location.country.index', compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.location.country.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255', 'unique:industry_types,name']
        ]);

        $country = new Country();
        $country->name = $request->name;
        $country->save();

        Notify::createdNotification();
        return to_route('admin.countries.index');

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
        $countries = Country::findOrFail($id);

        return view('admin.location.country.edit', compact('countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'max:255', 'unique:industry_types,name']
        ]);

        $countries = Country::findOrFail($id);
        $countries->name = $request->name;
        $countries->save();

        Notify::updateNotification();
        return to_route('admin.countries.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            Country::findOrFail($id)->delete();
            Notify::deletedNotification();
            return response(['message' => 'success'], 200);

        }catch(\Exception $e){
            logger($e);
            return response(['message' => 'Something Went Wrong, Please try again']);

        }

    }
}
