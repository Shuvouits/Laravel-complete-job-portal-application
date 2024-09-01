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
        $query = Company::query();
        $companies = $query->paginate(21);
        return view('frontend.company.all_company', compact('companies'));
    }

    public function shows($slug){
        $company_data = Company::where(['profile_completion' => '1', 'visibility' => '1', 'slug' => $slug])->firstOrFail();
        return view('frontend.company.company_details', compact('company_data'));
    }



}
