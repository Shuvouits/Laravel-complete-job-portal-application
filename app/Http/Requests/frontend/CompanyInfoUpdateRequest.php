<?php

namespace App\Http\Requests\frontend;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Company;

class CompanyInfoUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules =  [
            'logo' => ['image', 'max:9000'],
            'banner' => ['image', 'max:9000'],
            'name' => ['required', 'string', 'max:1000'],
            'bio' => ['required'],
            'vision' => ['required'],
        ];

        $company = Company::where('user_id', auth()->user()->id)->first();

     


        if(empty($company) || !$company?->logo){
            $rules['logo'][] = 'required';
        }

        if(empty($company) || !$company?->banner){
            $rules['banner'][] = 'required';
        }

        return $rules;
    }
}
