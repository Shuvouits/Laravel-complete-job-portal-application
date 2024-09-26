<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\GeneralSettingUpdateRequest;
use App\Models\SiteSetting;
use App\Services\Notify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SiteSettingController extends Controller
{

    function __construct()
    {
        $this->middleware(['permission:site settings']);
    }

    
    public function index(){
        return view('admin.site-setting.index');
    }

    function updateGeneralSetting(GeneralSettingUpdateRequest $request){
        $validatedData = $request->validated();


        foreach($validatedData as $key => $value) {
            SiteSetting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );

        }

        Cache::forget('settings');

        Notify::updateNotification();

        return redirect()->back();

    }
}
