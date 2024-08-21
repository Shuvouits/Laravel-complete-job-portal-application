<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\JobExperience;
use App\Services\Notify;
use App\Traits\Searchable;

class JobExperienceController extends Controller
{
    use Searchable;

    public function index()
    {
        $query = JobExperience::query();
            $this->search($query, ['name', 'slug']);
            $jobExperiences = $query->paginate(20);
        return view('admin.job.job-experience.index', compact('jobExperiences'));
    }

    public function create()
    {
        return view('admin.job.job-experience.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
        ]);

        $type = new JobExperience();
        $type->name = $request->name;
        $type->save();

        Notify::createdNotification();

        return to_route('admin.job-experiences.index');
    }

    public function edit(string $id)
    {
        $experience = JobExperience::findOrFail($id);
        return view('admin.job.job-experience.edit', compact('experience'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
        ]);

        $type = JobExperience::findOrFail($id);
        $type->name = $request->name;
        $type->save();

        Notify::updateNotification();
        return to_route('admin.job-experiences.index');
    }

    public function destroy(string $id)
    {


        try {
            JobExperience::findOrFail($id)->delete();
            Notify::deletedNotification();
            return response(['message' => 'success'], 200);

        }catch(\Exception $e) {
            logger($e);
            return response(['message' => 'Something Went Wrong Please Try Again!'], 500);
        }
    }



}
