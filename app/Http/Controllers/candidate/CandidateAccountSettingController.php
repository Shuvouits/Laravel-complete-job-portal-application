<?php

namespace App\Http\Controllers\candidate;

use App\Http\Controllers\Controller;
use App\Http\Requests\frontend\CandidateProfileAccountSetting;
use App\Models\Candidate;
use App\Models\State;
use App\Models\City;
use App\Models\User;
use App\Services\Notify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rules;

class CandidateAccountSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function AccountInfoUpdate(CandidateProfileAccountSetting $request)
    {
        Candidate::updateOrCreate(
            ['user_id' => auth()->user()->id],
            [
                'country' => $request->country,
                'state' => $request->state,
                'city' => $request->city,
                'address' => $request->address,
                'phone_one' => $request->phone,
                'phone_two' => $request->secondary_phone,
                'email' => $request->email
            ]
        );

        Notify::updateNotification();
        return redirect()->back();
    }

    public function EmailChanged(Request $request){
        $validatedData = $request->validate([
            'email' => ['required', 'string'],
        ]);

        User::updateOrCreate(
            ['id' => Auth::user()->id],

            [
                'email' => $validatedData['email'],
            ]

            );

        Notify::updateNotification();
        return redirect()->back();

    }

    public function PasswordChanged(Request $request){

        $validator = \Validator::make($request->all(), [
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        Auth::user()->update(['password' => bcrypt($request->password)]);
        return response()->json(['message' => 'Password Updated Successfully'], 200);

    }


    public function GetState($country_id)
    {
        $states = State::where('country_id', $country_id)->get();
        return response()->json($states);
    }

   

    public function GetCities($state_id)
    {
        $city = City::where('state_id', $state_id)->get();
        return response()->json($city);
    }

}
