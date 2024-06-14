<?php

namespace App\Http\Controllers;

use App\Models\State;
use Illuminate\Http\Request;
use App\Models\City;

class LocationController extends Controller
{
    public function GetState($country_id){
        $states = State::where('country_id', $country_id)->get();
        return response()->json($states);
    }

    public function GetCity($state_id){
        $cities = City::where('state_id', $state_id)->get();
        return response()->json($cities);
    }

    public function AllCity(){
        $city = City::all();
        return response()->json($city);
    }


}
