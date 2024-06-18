<?php

namespace App\Http\Requests\frontend;

use App\Models\Candidate;
use Illuminate\Foundation\Http\FormRequest;

class CandidateInfoUpdateRequest extends FormRequest
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
            'profile_picture' => ['image', 'max:9000'],
            'cv' => ['nullable', 'mimes:pdf,csv,epub', 'max:10000'],
            'full_name' => ['required', 'max:50'],
            'title' => ['nullable', 'max:255', 'string'],
            'experience_level' => ['required', 'integer'],
            'website' => ['nullable', 'active_url'],
            'date_of_birth' => ['required'],

        ];

        $candidate = Candidate::where('user_id', auth()->user()->id)->first();


        if(empty($candidate) || !$candidate?->image){
            $rules['profile_picture'][] = 'required';
        }


        return $rules;
    }
}
