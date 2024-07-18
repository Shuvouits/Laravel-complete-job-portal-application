<?php

namespace App\Http\Controllers\admin\payment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PaypalUpdatingRequest;
use App\Models\PaymentSetting;
use App\Services\Notify;
use App\Services\PaymentGatewaySettingService;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Illuminate\Support\Facades\Session;

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

    function setPaypalConfig(): array
    {
        return  [
            'mode'    => config('gatewaySettings.paypal_account_mode'), // Can only be 'sandbox' Or 'live'. If empty or invalid, 'live' will be used.
            'sandbox' => [
                'client_id'         => config('gatewaySettings.paypal_client_id'),
                'client_secret'     => config('gatewaySettings.paypal_client_secret'),
                'app_id'            => 'APP-80W284485P519543T',
            ],
            'live' => [
                'client_id'         => config('gatewaySettings.paypal_client_id'),
                'client_secret'     => config('gatewaySettings.paypal_client_secret'),
                'app_id'            => config('gatewaySettings.paypal_app_id'),
            ],

            'payment_action' => 'Sale', // Can only be 'Sale', 'Authorization' or 'Order'
            'currency'       => config('gatewaySettings.paypal_currency_name'),
            'notify_url'     => '', // Change this accordingly for your application.
            'locale'         => 'en_US', // force gateway language  i.e. it_IT, es_ES, en_US ... (for express checkout only)
            'validate_ssl'   => env('PAYPAL_VALIDATE_SSL', true), // Validate SSL when creating api client.
        ];
    }

    function payWithPaypal()
    {
        //abort_if(!$this->checkSession(), 404);

        $config = $this->setPaypalConfig();

        $provider = new PayPalClient($config);

        $provider->getAccessToken();




        // calculate payable amount
        $payableAmount = round(Session::get('selected_plan')['price'] * config('gatewaySettings.paypal_currency_rate'));



        $response = $provider->createOrder([
            'intent' => 'CAPTURE',
            'application_context' => [
                'return_url' => route('paypal.success'),
                'cancel_url' => route('paypal.cancel')
            ],
            'purchase_units' => [
                [
                    'amount' => [
                        'currency_code' => config('gatewaySettings.paypal_currency_name'),
                        'value' => $payableAmount
                    ]
                ]
            ]
        ]);



        if(isset($response['id']) && $response['id'] !== NULL) {
            foreach($response['links'] as $link) {
                if($link['rel'] === 'approve') {
                    return redirect()->away($link['href']);
                }
            }
        }

    }

    function paypalSuccess(Request $request){

        $config = $this->setPaypalConfig();
        $provider = new PayPalClient($config);
        $provider->getAccessToken();

        $response = $provider->capturePaymentOrder($request->token);

        dd($response);
    }






}
