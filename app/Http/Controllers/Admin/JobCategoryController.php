<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\JobCategory;
use Illuminate\Http\Request;
use App\Services\Notify;
use App\Traits\Searchable;
use Illuminate\Http\RedirectResponse;

class JobCategoryController extends Controller
{

    use Searchable;

    function __construct()
    {
        $this->middleware(['permission:job category create|job category update|job category delete'])->only(['index']);
        $this->middleware(['permission:job category create'])->only(['create', 'store']);
        $this->middleware(['permission:job category update'])->only(['edit', 'update']);
        $this->middleware(['permission:job category delete'])->only(['destroy']);
    }

   



    public function index()
    {
        $query = JobCategory::query();
        $this->search($query, ['name', 'slug']);
        $categories = $query->paginate(20);
        return view('admin.job.job-category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.job.job-category.create');
    }

    public function store(Request $request) : RedirectResponse
    {
        $request->validate([
            'icon' => ['required', 'max:255'],
            'name' => ['required', 'max:255']
        ]);

        $category = new JobCategory();
        $category->icon = $request->icon;
        $category->name = $request->name;
        $category->show_at_popular = $request->show_at_popular;
        $category->show_at_featured = $request->show_at_featured;


        $category->save();

        Notify::createdNotification();

        return to_route('admin.job-categories.index');
    }

    public function edit(string $id)
    {
        $category = JobCategory::findOrFail($id);
        return view('admin.job.job-category.edit', compact('category'));
    }

    public function update(Request $request, string $id) : RedirectResponse
    {
        $request->validate([
            'icon' => ['nullable', 'max:255'],
            'name' => ['required', 'max:255']
        ]);

        $category = JobCategory::findOrFail($id);
        if($request->filled('icon')) $category->icon = $request->icon;
        $category->name = $request->name;
        $category->show_at_popular = $request->show_at_popular;
        $category->show_at_featured = $request->show_at_featured;

        $category->save();

        Notify::updateNotification();

        return to_route('admin.job-categories.index');
    }

    public function destroy(string $id)
    {

        // validation
        $jobExist = Job::where('job_category_id', $id)->exists();
        if($jobExist) {
            return response(['message' => 'This item is already been used can\'t delete!'], 500);
        }


        try {
            JobCategory::findOrFail($id)->delete();
            Notify::deletedNotification();
            return response(['message' => 'success'], 200);

        }catch(\Exception $e) {
            logger($e);
            return response(['message' => 'Something Went Wrong Please Try Again!'], 500);
        }
    }



}
