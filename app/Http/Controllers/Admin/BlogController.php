<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\BlogCreateRequest;
use App\Models\Blog;
use Illuminate\Http\Request;
use App\Traits\FileUploadTrait;
use App\Traits\Searchable;
use App\Services\Notify;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use FileUploadTrait, Searchable;

    function __construct()
    {
        $this->middleware(['permission:blogs']);
    }


    public function index()
    {
        $query = Blog::query();
        $this->search($query, ['title', 'slug']);
        $blogs = $query->orderBy('id', 'DESC')->paginate(20);

        return view('admin.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogCreateRequest $request)
    {



        $imagePath = $this->uploadFile($request, 'image');


        $blog = new Blog();
        $blog->image = $imagePath;
        $blog->title = $request->title;
        $blog->author_id = auth()->user()->id;
        $blog->description = $request->description;
        $blog->status = $request->status;
        $blog->featured = $request->featured;
        $blog->save();
        Notify::createdNotification();

        return to_route('admin.blogs.index');
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
        $blog = Blog::findOrFail($id);
        return view('admin.blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'description' => 'required|string|max:16777215', // LONGTEXT limit in bytes
        ]);

        
        $imagePath = $this->uploadFile($request, 'image');

        $blog = Blog::findOrFail($id);

        if($imagePath) $blog->image = $imagePath;
        $blog->title = $request->title;
        $blog->author_id = auth()->user()->id;
        $blog->description = $request->description;
        $blog->status = $request->status;
        $blog->featured = $request->featured;
        $blog->save();
        Notify::updateNotification();

        return to_route('admin.blogs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Blog::findOrFail($id)->delete();
            Notify::deletedNotification();
            return response(['message' => 'success'], 200);

        }catch(\Exception $e) {
            logger($e);
            return response(['message' => 'Something Went Wrong Please Try Again!'], 500);
        }
    }
}
