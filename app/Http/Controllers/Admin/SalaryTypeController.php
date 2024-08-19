<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SalaryType;
use App\Services\Notify;
use App\Traits\Searchable;


class SalaryTypeController extends Controller
{
    use Searchable;

    public function index()
    {
        $query = SalaryType::query();
            $this->search($query, ['name', 'slug']);
            $salaryTypes = $query->paginate(20);
        return view('admin.job.salary-type.index', compact('salaryTypes'));
    }

    public function create()
    {
        return view('admin.job.salary-type.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
        ]);

        $type = new SalaryType();
        $type->name = $request->name;
        $type->save();

        Notify::createdNotification();
        return to_route('admin.salary-types.index');
    }

    public function edit(string $id)
    {
        $type = SalaryType::findOrFail($id);
        return view('admin.job.salary-type.edit', compact('type'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
        ]);

        $type = SalaryType::findOrFail($id);
        $type->name = $request->name;
        $type->save();

        Notify::updateNotification();
        return to_route('admin.salary-types.index');
    }

    public function destroy(string $id)
    {
        

        try {
            SalaryType::findOrFail($id)->delete();
            Notify::deletedNotification();
            return response(['message' => 'success'], 200);

        }catch(\Exception $e) {
            logger($e);
            return response(['message' => 'Something Went Wrong Please Try Again!'], 500);
        }
    }

}
