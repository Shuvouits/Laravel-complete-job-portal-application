<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\State;
use App\Services\Notify;
use Illuminate\Http\Request;
use App\Traits\Searchable;
use Illuminate\Http\RedirectResponse;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    Use Searchable;
    public function index()
    {
        $query = State::query();
        $this->search($query, ['name']);
        $states = $query->orderBy('id', 'DESC')->paginate(10);
        return view('admin.location.state.index', compact('states'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $country = Country::all();
        return view('admin.location.state.create', compact('country'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'max:255', 'unique:states,name'],
            'country_id' => ['required']
        ]);


        $state = new State();
        $state->name = $request->name;
        $state->country_id = $request->country_id;
        $state->save();

        Notify::createdNotification();
        return to_route('admin.states.index');
        //return redirect('/admin/states');

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
        $states = State::findOrFail($id);
        $country = Country::all();
        return view('admin.location.state.edit', compact('states', 'country'));
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
        try{
            State::findOrFail($id)->delete();
            Notify::deletedNotification();
            return response(['message' => 'success'], 200);

        }catch(\Exception $e){
            logger($e);
            return response(['message' => 'Something Went Wrong, Please try again']);

        }
    }
}
