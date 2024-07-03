<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function AllPlan(){
        $plans = Plan::all();
        return view('frontend.pricing.pricing', compact('plans'));
    }
}
