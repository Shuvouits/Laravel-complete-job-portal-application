<?php

namespace App\Http\Requests\frontend;

use Illuminate\Foundation\Http\FormRequest;

class CandidateExperienceRequest extends FormRequest
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
        return [
            'company' => ['required', 'max:255'],
            'department' => ['required', 'max:255'],
            'designation' => ['required', 'max:255'],
            'start' => ['required', 'date'],
            'end' => ['required', 'date'],
            'currently_working' => ['nullable'],
            'responsiblities' => ['nullable', 'max:500']
        ];
    }
}
