<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;
use App\Traits\Searchable;
use App\Services\Notify;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    Use Searchable;
    public function index()
    {
        $query = City::query();
        $this->search($query, ['name']);
        $cities = $query->orderBy('id','DESC')->with(['state', 'country'])->paginate(10);
        return view('admin.location.city.index',compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $country = Country::all();
        return view('admin.location.city.create', compact('country'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255', 'unique:cities,name'],
            'country_id' => ['required'],
            'state_id' => ['required'],
        ]);


        $city = new City();
        $city->name = $request->name;
        $city->country_id = $request->country_id;
        $city->state_id = $request->state_id;
        $city->save();

        Notify::createdNotification();
        return to_route('admin.cities.index');
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
        $city_data = City::findOrFail($id);

        $country = Country::all();
        $state  = State::where('country_id', $city_data->country_id)->get();
        return view('admin.location.city.edit', compact('city_data', 'country', 'state'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'max:255', 'unique:cities,name'],
            'country_id' => ['required'],
            'state_id' => ['required']
        ]);

        $city = City::findOrFail($id);
        $city->name = $request->name;
        $city->country_id = $request->country_id;
        $city->state_id = $request->state_id;
        $city->save();

        Notify::updateNotification();
        return to_route('admin.cities.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            City::findOrFail($id)->delete();
            Notify::deletedNotification();
            return response(['message' => 'success'], 200);

        }catch(\Exception $e){
            logger($e);
            return response(['message' => 'Something Went Wrong, Please try again']);

        }
    }

    public function GetState($id){
        $states = State::where('country_id', $id)->get();
        return response()->json($states);

    }

    public function GetCities($state_id)
    {
        $city = City::where('state_id', $state_id)->get();
        return response()->json($city);
    }
    
}
