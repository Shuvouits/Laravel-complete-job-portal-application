<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Services\Notify;
use Illuminate\Http\Request;
use App\Traits\FileUploadTrait;
use App\Traits\Searchable;

class ReviewController extends Controller
{
    use FileUploadTrait, Searchable;

    function __construct()
    {
        $this->middleware(['permission:sections']);
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Review::query();
        $this->search($query, ['name', 'title', 'rating']);
        $reviews = $query->orderBy('id', 'DESC')->paginate(20);
        return view('admin.review.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.review.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $imagePath = $this->uploadFile($request, 'image');

        $review = new Review();
        $review->image = $imagePath;
        $review->name = $request->name;
        $review->title = $request->title;
        $review->review = $request->review;
        $review->rating = $request->rating;
        $review->save();

        Notify::createdNotification();
        return to_route('admin.reviews.index');
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
        $review = Review::findOrFail($id);
        return view('admin.review.edit', compact('review'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $imagePath = $this->uploadFile($request, 'image');

        $review = Review::findOrFail($id);
        if($imagePath) $review->image = $imagePath;
        $review->name = $request->name;
        $review->title = $request->title;
        $review->review = $request->review;
        $review->rating = $request->rating;
        $review->save();

        Notify::updateNotification();
        return to_route('admin.reviews.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Review::findOrFail($id)->delete();
            Notify::deletedNotification();
            return response(['message' => 'success'], 200);

        }catch(\Exception $e) {
            logger($e);
            return response(['message' => 'Something Went Wrong Please Try Again!'], 500);
        }
    }
}
