<?php

namespace App\Http\Controllers\admin\payment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PaypalUpdatingRequest;
use App\Models\PaymentSetting;
use App\Services\Notify;
use App\Services\PaymentGatewaySettingService;
use Illuminate\Http\Request;

class PaymentSettingController extends Controller
{
    public function Payment(){
        return view('admin.payment.payment_setting');
    }

    public function UpdatePaypalSetting(PaypalUpdatingRequest $request){
        $validatedData = $request->validated();

        foreach($validatedData as $key => $value) {
            PaymentSetting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        $settingsService = app(PaymentGatewaySettingService::class);
        $settingsService->clearCachedSettings();

        Notify::updateNotification();

        return redirect()->back();

    }
}
