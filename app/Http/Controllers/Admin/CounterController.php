<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Counter;
use App\Services\Notify;
use Illuminate\Http\Request;

class CounterController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     function __construct()
     {
         $this->middleware(['permission:sections']);
     }

     
    public function index()
    {
        $counter = Counter::first();
        return view('admin.counter.index', compact('counter'));
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
        $request->validate([
            'counter_one' => ['required', 'numeric'],
            'title_one' => ['required', 'max:255'],
            'counter_two' => ['required', 'numeric'],
            'title_two' => ['required', 'max:255'],
            'counter_three' => ['required', 'numeric'],
            'title_three' => ['required', 'max:255'],
            'counter_four' => ['required', 'numeric'],
            'title_four' => ['required', 'max:255'],
        ]);

        Counter::updateOrCreate(
            ['id' => 1],
            [
                'counter_one' => $request->counter_one,
                'title_one' => $request->title_one,
                'counter_two' => $request->counter_two,
                'title_two' => $request->title_two,
                'counter_three' => $request->counter_three,
                'title_three' => $request->title_three,
                'counter_four' => $request->counter_four,
                'title_four' => $request->title_four,
            ]
        );
        Notify::updateNotification();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
