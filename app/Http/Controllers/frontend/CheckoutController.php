<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function Checkout($id){
        $plan = Plan::where('id', $id)->firstOrFail();
        return view('frontend.checkout.checkout', compact('plan'));
    }
}
