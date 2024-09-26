<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\GeneralSettingUpdateRequest;
use App\Models\SiteSetting;
use App\Services\Notify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Services\SiteSettingService;
use App\Traits\FileUploadTrait;

class SiteSettingController extends Controller
{

    use FileUploadTrait;

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

    function updateLogoSetting(Request $request) {
        $request->validate([
            'logo' => ['image', 'max:2000'],
            'favicon' => ['image', 'max:2000'],
        ]);

        $logoPath = $this->uploadFile($request, 'logo');
        $faviconPath = $this->uploadFile($request, 'favicon');

        $logoData = [];
        if($logoPath) $logoData['value'] = $logoPath;

        SiteSetting::updateOrCreate(
            ['key' => 'site_logo'],
            $logoData
        );

        $faviconData = [];
        if($faviconPath) $faviconData['value'] = $faviconPath;

        SiteSetting::updateOrCreate(
            ['key' => 'site_favicon'],
            $faviconData
        );

        $siteSetting = app()->make(SiteSettingService::class);
        $siteSetting->clearCachedSettings();

        Notify::updateNotification();

        return redirect()->back();
    }



}
