<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class CompanyOrderController extends Controller
{
    function index(){
        $orders = Order::where('company_id', auth()->user()->company->id)->paginate(20);
        return view('frontend.company-dashboard.order.index', compact('orders'));
    }
}
