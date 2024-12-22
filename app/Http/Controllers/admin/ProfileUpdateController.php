<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Services\Notify;
use Illuminate\Http\Request;
use App\Traits\FileUploadTrait;
use Illuminate\Support\Facades\Auth;

class ProfileUpdateController extends Controller
{

    use FileUploadTrait;

    public function index()
    {
        $admin = auth()->guard('admin')->user();
        return view('admin.profile.index', compact('admin'));
    }


    public function update(Request $request)
    {


        $request->validate([
            'name' => ['required', 'max:255'],
            'image' => ['nullable', 'max:2000', 'image'],
            'email' => ['required', 'email', 'max:255']
        ]);




        $imagePath = $this->uploadFile($request, 'image');

        $admin = auth()->guard('admin')->user();
        if($imagePath) $admin->image = $imagePath;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->save();

        Notify::updateNotification();

        return redirect()->back();
    }

    function passwordUpdate(Request $request){
        $request->validate([
            'password' => ['required', 'confirmed'],
        ]);

        $admin = auth()->guard('admin')->user();
        $admin->password = bcrypt($request->password);
        $admin->save();
        Notify::updateNotification();

        return redirect()->back();
    }


}
