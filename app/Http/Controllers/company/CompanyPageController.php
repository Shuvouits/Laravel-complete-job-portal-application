<?php

namespace App\Http\Controllers\company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyPageController extends Controller
{
    public function AllCompany(){
        $all_company = Company::all();
        return view('frontend.company.all_company', compact('all_company'));
    }
}
