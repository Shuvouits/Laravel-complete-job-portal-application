<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CustomaPageBuilder;
use App\Models\CustomPageBuilder;
use Illuminate\Http\Request;

use App\Services\Notify;
use App\Traits\Searchable;

class CustomPageBuilderController extends Controller
{
    use Searchable;

    function __construct()
    {
        $this->middleware(['permission:site pages']);
    }

    

    public function index()
    {
        $query = CustomPageBuilder::query();
        $this->search($query, ['page_name']);
        $pages = $query->orderBy('id', 'DESC')->paginate(20);
        return view('admin.page-builder.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.page-builder.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'page_name' => ['required', 'max:255'],
            'content' => ['required']
        ]);

        $page = new CustomPageBuilder();
        $page->page_name = $request->page_name;
        $page->content = $request->content;
        $page->save();

        Notify::createdNotification();

        return to_route('admin.page-builder.index');
    }

    public function edit(string $id)
    {
        $page = CustomPageBuilder::findOrFail($id);
        return view('admin.page-builder.edit', compact('page'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'page_name' => ['required', 'max:255'],
            'content' => ['required']
        ]);

        $page = CustomPageBuilder::findOrFail($id);
        $page->page_name = $request->page_name;
        $page->content = $request->content;
        $page->save();

        Notify::updateNotification();

        return to_route('admin.page-builder.index');
    }

    public function destroy(string $id)
    {
        try {
            CustomPageBuilder::findOrFail($id)->delete();
            Notify::deletedNotification();
            return response(['message' => 'success'], 200);

        }catch(\Exception $e) {
            logger($e);
            return response(['message' => 'Something Went Wrong Please Try Again!'], 500);
        }
    }





}
