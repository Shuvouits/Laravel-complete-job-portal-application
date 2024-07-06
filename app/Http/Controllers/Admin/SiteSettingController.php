<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\GeneralSettingUpdateRequest;
use App\Models\SiteSetting;
use App\Services\Notify;
use Illuminate\Http\Request;

class SiteSettingController extends Controller
{
    public function Index(){
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

        Notify::updateNotification();

        return redirect()->back();

    }
}
