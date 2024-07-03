<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Index(){
        $plans = Plan::all();
        return view('frontend.home.index', compact('plans'));
    }
}
