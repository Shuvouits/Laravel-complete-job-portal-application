<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\JobCategory;
use Illuminate\Http\Request;
use App\Services\Notify;
use App\Traits\Searchable;
use Illuminate\Http\RedirectResponse;

class JobCategoryController extends Controller
{

    use Searchable;

    public function index()
    {
        $query = JobCategory::query();
        $this->search($query, ['name', 'slug']);
        $categories = $query->paginate(20);
        return view('admin.job.job-category.index', compact('categories'));
    }
}
