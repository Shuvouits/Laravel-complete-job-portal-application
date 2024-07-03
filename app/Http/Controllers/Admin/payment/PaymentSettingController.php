<?php

namespace App\Http\Controllers\admin\payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentSettingController extends Controller
{
    public function Payment(){
        return view('admin.payment.payment_setting');
    }
}
