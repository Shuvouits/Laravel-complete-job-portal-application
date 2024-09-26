<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutUsUpdateRequest;
use App\Models\About;
use App\Services\Notify;
use Illuminate\Http\Request;
use App\Traits\FileUploadTrait;

class AboutController extends Controller
{
    use FileUploadTrait;

    function __construct()
    {
        $this->middleware(['permission:site pages']);
    }
    
    //
    public function index()
    {
        $about = About::first();
        return view('admin.about-us.index', compact('about'));
    }

    public function update(AboutUsUpdateRequest $request, string $id)
    {
        $imagePath = $this->uploadFile($request, 'image');
        $formData = [];
        $formData['title'] = $request->title;
        $formData['description'] = $request->description;
        $formData['url'] = $request->url;
        $formData['image'] = $imagePath;

        About::updateOrCreate(
            ['id' => 1],
            $formData
        );

        Notify::updateNotification();
        return redirect()->back();
    }


}
