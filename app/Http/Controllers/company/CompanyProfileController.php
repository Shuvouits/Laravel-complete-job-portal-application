<?php

namespace App\Http\Controllers\company;

use App\Http\Controllers\Controller;

use App\Http\Requests\frontend\CompanyFoundingInfoUpdateRequest;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use App\Http\Requests\frontend\CompanyInfoUpdateRequest;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;

class CompanyProfileController extends Controller
{
    use FileUploadTrait;
    public function CompanyProfile()
    {
        $companyInfo = Company::where('user_id', auth()->user()->id)->first();
        return view('frontend.company-dashboard.profile.index', compact('companyInfo'));
    }

    public function CompanyInfo(CompanyInfoUpdateRequest $request)
    {

        $logoPath = $this->uploadFile($request, 'logo');
        $bannerPath = $this->uploadFile($request, 'banner');

        $data = [];
        if (!empty($logoPath))
            $data['logo'] = $logoPath;
        if (!empty($bannerPath))
            $data['banner'] = $bannerPath;
        $data['name'] = $request->name;
        $data['bio'] = $request->bio;
        $data['vision'] = $request->vision;


        Company::updateOrCreate(
            ['user_id' => auth()->user()->id],
            $data
        );

        notify()->success('updated Successfully', 'Success!');

        return redirect()->back();

    }

    public function FoundingInfo(CompanyFoundingInfoUpdateRequest $request)
    {

        // dd($request->all());

        Company::updateOrCreate(
            ['user_id' => auth()->user()->id],

            [
                'industry_type_id' => $request->industry_type,
                'organization_type_id' => $request->organization_type,
                'team_size_id' => $request->team_size,
                'establishment_date' => $request->establishment_date,
                'website' => $request->website,
                'email' => $request->email,
                'phone' => $request->phone,
                'country' => $request->country,
                'state' => $request->state,
                'city' => $request->city,
                'address' => $request->address,
                'map_link' => $request->map_link
            ]
            
        );

        notify()->success('updated Successfully', 'Success!');
        return redirect()->back();

    }

    public function AccountInfo(Request $request){
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email']
        ]);

        Auth::user()->update($validatedData);
        notify()->success('Updated Successfully', 'Success!');
        return redirect()->back();
    }

    public function PasswordInfo(Request $request){

        $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        Auth::user()->update(['password' => bcrypt($request->password)]);
        notify()->success('Password Updated Successfully', 'Success!');
        return redirect()->back();
    }


}