<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;
use App\Traits\Searchable;
use App\Services\Notify;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use Searchable;

    function __construct()
    {
        $this->middleware(['permission:job attribute']);
    }


    public function index()
    {

        $query = Education::query();
        $this->search($query, ['name', 'slug']);
        $educations = $query->orderBy('id', 'DESC')->paginate(20);

        return view('admin.job.education.index', compact('educations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.job.education.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
        ]);

        $education = new Education();
        $education->name = $request->name;
        $education->save();

        Notify::createdNotification();

        return to_route('admin.educations.index');
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
        $education = Education::findOrFail($id);
        return view('admin.job.education.edit', compact('education'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
        ]);

        $education = Education::findOrFail($id);
        $education->name = $request->name;
        $education->save();

        Notify::updateNotification();

        return to_route('admin.educations.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Education::findOrFail($id)->delete();
            Notify::deletedNotification();
            return response(['message' => 'success'], 200);
        } catch (\Exception $e) {
            logger($e);
            return response(['message' => 'Something Went Wrong Please Try Again!'], 500);
        }
    }
}
