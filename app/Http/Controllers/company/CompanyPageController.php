<?php

namespace App\Http\Controllers\company;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\CandidateSkill;
use App\Models\Company;
use App\Models\Job;
use Illuminate\Http\Request;

class CompanyPageController extends Controller
{
    public function AllCompany(){
        $query = Company::query();
        $companies = $query->paginate(21);
        return view('frontend.company.all_company', compact('companies'));
    }

    public function shows($slug){
        $company = Company::where(['profile_completion' => 1, 'visibility' => 1, 'slug' => $slug])->firstOrFail();
        $openJobs = Job::where('company_id', $company->id)->where('status', 'active')->where('deadline', '>=', date('Y-m-d'))->paginate(10);
        return view('frontend.company.company_details', compact('company','openJobs'));
    }



}
