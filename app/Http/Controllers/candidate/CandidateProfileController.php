<?php

namespace App\Http\Controllers\candidate;

use App\Http\Controllers\Controller;
use App\Http\Requests\frontend\CandidateFoundingInfoUpdateRequest;
use App\Http\Requests\frontend\CandidateInfoUpdateRequest;
use App\Models\Candidate;
use App\Models\CandidateLanguage;
use App\Models\CandidateSkill;
use App\Models\Experience;
use App\Models\Language;
use App\Models\Profession;
use App\Models\Skill;
use App\Services\Notify;
use Illuminate\Http\Request;
use App\Traits\FileUploadTrait;

class CandidateProfileController extends Controller
{

    use FileUploadTrait;
    public function CandidateProfile()
    {
        $candidate = Candidate::where('user_id', auth()->user()->id)->first();
        $experience = Experience::all();
        $profession = Profession::all();
        $skill = Skill::all();
        $language = Language::all();
        $candidate_skill = CandidateSkill::where('candidate_id', $candidate->id)->pluck('skill_id')->toArray();
        $candidate_language = CandidateLanguage::where('candidate_id', $candidate->id)->pluck('language_id')->toArray();

        return view('frontend.candidate-dashboard.profile.index', compact('candidate', 'experience', 'profession', 'skill', 'language','candidate_skill', 'candidate_language'));
    }


    public function BasicInfo(CandidateInfoUpdateRequest $request){

        $imagePath = $this->uploadFile($request, 'profile_picture');
        $cvPath = $this->uploadFile($request, 'cv');

        $data = [];

        if(!empty($imagePath)){
            $data['image'] = $imagePath;

        }
        if(!empty($cvPath)){
            $data['cv'] = $cvPath;
        }

        $data['full_name'] = $request->full_name;
        $data['title'] = $request->title;
        $data['experience_id'] = $request->experience_level;
        $data['website'] = $request->website;
        $data['birth_date'] = $request->date_of_birth;




        Candidate::updateOrCreate(
            ['user_id' => auth()->user()->id],
            $data

        );

        Notify::updateNotification();

        return redirect()->back();

    }

    public function ProfileInfo(CandidateFoundingInfoUpdateRequest $request){
        // Collect data from the request
        $data['gender'] = $request->gender;
        $data['maritial_status'] = $request->maritial_status;
        $data['profession_id'] = $request->profession_id;
        $data['status'] = $request->status;
        $data['bio'] = $request->bio;

        // Get the current user ID
        $user_id = auth()->user()->id;

        // Create or update the candidate record and retrieve the candidate instance
        $candidate = Candidate::updateOrCreate(
            ['user_id' => $user_id],
            $data
        );

        // Get the candidate ID from the created or updated candidate instance
        $candidate_id = $candidate->id;

        // Clear previous language and skill entries
        CandidateLanguage::where('candidate_id', $candidate_id)->delete();
        CandidateSkill::where('candidate_id', $candidate_id)->delete();

        // Handle languages
        if (is_array($request->language)) {
            foreach ($request->language as $language_id) {
               $candidate_language = new CandidateLanguage();
               $candidate_language->candidate_id = $candidate_id;
               $candidate_language->language_id = $language_id;
               $candidate_language->save();
            }
        }

        // Handle skills
        if (is_array($request->skill)) {
            foreach ($request->skill as $skill_id) {
                CandidateSkill::create([
                    'candidate_id' => $candidate_id,
                    'skill_id' => $skill_id,
                ]);
            }
        }

        // Notify user
        Notify::updateNotification();

        // Redirect back
        return redirect()->back();
    }


}
