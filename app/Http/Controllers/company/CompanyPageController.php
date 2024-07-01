<?php

namespace App\Http\Controllers\company;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\CandidateSkill;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyPageController extends Controller
{
    public function AllCompany(){
        $all_company = Company::where(['profile_completion' => '1', 'visiblity' => '1'])->get();
        return view('frontend.company.all_company', compact('all_company'));
    }

    public function CompanyDetails($slug){
        $company_data = Company::where(['profile_completion' => '1', 'visiblity' => '1', 'slug' => $slug])->firstOrFail();
        return view('frontend.company.company_details', compact('company_data'));
    }

    

}
