<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\frontend\JobCreateRequest;
use App\Models\Benifit;
use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Job;
use App\Models\JobBenifit;
use App\Models\JobCategory;
use App\Models\JobRole;
use App\Models\JobSkill;
use App\Models\JobTag;
use App\Models\JobType;
use App\Models\SalaryType;
use App\Models\Skill;
use App\Models\State;
use App\Models\Tag;
use App\Services\Notify;
use Illuminate\Http\Request;
use App\Traits\Searchable;

class JobController extends Controller
{

    use Searchable;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Job::query();
       // $query->withCount('applications');
        $this->search($query, ['title', 'slug']);
        $jobs = $query->where('company_id', auth()->user()->company?->id)->orderBy('id', 'DESC')->paginate(20);
        return view('frontend.company-dashboard.job.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::where(['profile_completion' => 1, 'visiblity' => 1])->get();
        $categories = JobCategory::all();
        $countries = Country::all();
        $salaryTypes = SalaryType::all();
        $experiences = Experience::all();
        $jobRoles = JobRole::all();
        $educations = Education::all();
        $jobTypes = JobType::all();
        $tags = Tag::all();
        $skills = Skill::all();
        return view('frontend.company-dashboard.job.create', compact(
            'companies',
            'categories',
            'countries',
            'salaryTypes',
            'experiences',
            'jobRoles',
            'educations',
            'jobTypes',
            'tags',
            'skills'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JobCreateRequest $request)
    {
        $job = new Job();
        $job->title = $request->title;
        $job->company_id = auth()->user()->company->id;
        $job->job_category_id = $request->category;
        $job->vacancies = $request->vacancies;
        $job->deadline = $request->deadline;

        $job->country_id = $request->country;
        $job->state_id = $request->state;
        $job->city_id = $request->city;
        $job->address = $request->address;

        $job->salary_mode = $request->salary_mode;
        $job->min_salary = $request->min_salary;
        $job->max_salary = $request->max_salary;
        $job->custom_salary = $request->custom_salary;
        $job->salary_type_id = $request->salary_type;
        $job->job_experience_id = $request->experience;
        $job->job_role_id = $request->job_role;
        $job->education_id = $request->education;
        $job->job_type_id = $request->job_type;
        $job->job_type_id = $request->job_type;
        $job->featured = $request->featured;
        $job->highlight = $request->highlight;
        $job->description = $request->description;
        $job->save();

        // insert tags
        foreach($request->tags as $tag) {
            $createTag = new JobTag();
            $createTag->job_id = $job->id;
            $createTag->tag_id = $tag;
            $createTag->save();
        }

        $benefits = explode(',', $request->benefits);

        foreach($benefits as $benefit) {
            $createBenefit = new Benifit();
            $createBenefit->company_id = $job->company_id;
            $createBenefit->name = $benefit;
            $createBenefit->save();
            // store job benefit
            $jobBenefit = new JobBenifit();
            $jobBenefit->job_id = $job->id;
            $jobBenefit->benefit_id = $createBenefit->id;
            $jobBenefit->save();
        }

        // insert skills
        foreach($request->skills as $skill) {
            $createSkill = new JobSkill();
            $createSkill->job_id = $job->id;
            $createSkill->skill_id = $skill;
            $createSkill->save();
        }


        Notify::createdNotification();

        return to_route('company.jobs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $job = Job::findOrFail($id);

        $companies = Company::where(['profile_completion' => 1, 'visiblity' => 1])->get();
        $categories = JobCategory::all();
        $countries = Country::all();
        $states = State::where('country_id', $job->country_id)->get();
        $cities = City::where('state_id', $job->state_id)->get();
        $salaryTypes = SalaryType::all();
        $experiences = Experience::all();
        $jobRoles = JobRole::all();
        $educations = Education::all();
        $jobTypes = JobType::all();
        $tags = Tag::all();
        $skills = Skill::all();
        return view('frontend.company-dashboard.job.edit', compact(
            'companies',
            'categories',
            'countries',
            'states',
            'cities',
            'salaryTypes',
            'experiences',
            'jobRoles',
            'educations',
            'jobTypes',
            'tags',
            'skills',
            'job'
        ));


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JobCreateRequest $request, string $id)
    {
        $job = Job::findOrFail($id);

        $job->title = $request->title;
        $job->job_category_id = $request->category;
        $job->vacancies = $request->vacancies;
        $job->deadline = $request->deadline;

        $job->country_id = $request->country;
        $job->state_id = $request->state;
        $job->city_id = $request->city;
        $job->address = $request->address;

        $job->salary_mode = $request->salary_mode;
        $job->min_salary = $request->min_salary;
        $job->max_salary = $request->max_salary;
        $job->custom_salary = $request->custom_salary;
        $job->salary_type_id = $request->salary_type;
        $job->job_experience_id = $request->experience;
        $job->job_role_id = $request->job_role;
        $job->education_id = $request->education;
        $job->job_type_id = $request->job_type;
        $job->job_type_id = $request->job_type;
        $job->featured = $request->featured;
        $job->highlight = $request->highlight;
        $job->description = $request->description;
        $job->save();

        // insert tags
        JobTag::where('job_id', $id)->delete();
        foreach($request->tags as $tag) {
            $createTag = new JobTag();
            $createTag->job_id = $job->id;
            $createTag->tag_id = $tag;
            $createTag->save();
        }

        $selectedBenefits = JobBenifit::where('job_id', $id);
        foreach($selectedBenefits->get() as $selectedBenefit) {
            Benifit::find($selectedBenefit->benefit_id)->delete();
        }
        $selectedBenefits->delete();

        $benefits = explode(',', $request->benefits);

        foreach($benefits as $benefit) {
            $createBenefit = new Benifit();
            $createBenefit->company_id = $job->company_id;
            $createBenefit->name = $benefit;
            $createBenefit->save();
            // store job benefit
            $jobBenefit = new JobBenifit();
            $jobBenefit->job_id = $job->id;
            $jobBenefit->benefit_id = $createBenefit->id;
            $jobBenefit->save();
        }

        // insert skills
        JobSkill::where('job_id', $id)->delete();
        foreach($request->skills as $skill) {
            $createSkill = new JobSkill();
            $createSkill->job_id = $job->id;
            $createSkill->skill_id = $skill;
            $createSkill->save();
        }

        Notify::createdNotification();

        return to_route('company.jobs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            
            Job::findOrFail($id)->delete();
            Notify::deletedNotification();
            return response(['message' => 'success'], 200);

        }catch(\Exception $e) {
            logger($e);
            return response(['message' => 'Something Went Wrong Please Try Again!'], 500);
        }
    }
}