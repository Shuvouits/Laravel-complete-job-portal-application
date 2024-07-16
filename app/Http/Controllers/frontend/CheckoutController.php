<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function Checkout($id){
        $plan = Plan::where('id', $id)->firstOrFail();
        Session::put('selected_plan', $plan->toArray());
        return view('frontend.checkout.checkout', compact('plan'));
    }
}
