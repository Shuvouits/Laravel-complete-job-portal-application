<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Footer;
use Illuminate\Http\Request;
use App\Traits\FileUploadTrait;
use App\Services\Notify;

class FooterController extends Controller
{
    //

    use FileUploadTrait;

    public function index()
    {
        $footer = Footer::first();
        return view('admin.footer.index', compact('footer'));
    }

    public function update(Request $request, string $id)
    {
        $imagePath = $this->uploadFile($request, 'logo');
        $data = [
            'copyright' => $request->copyright,
            'details' => $request->details
        ];
        if($imagePath) $data['logo'] = $imagePath;

        Footer::updateOrCreate(
            ['id' => 1],
            $data
        );

        Notify::updateNotification();

        return redirect()->back();
    }


}
