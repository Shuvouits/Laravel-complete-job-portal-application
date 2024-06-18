<?php

namespace App\Http\Requests\frontend;

use Illuminate\Foundation\Http\FormRequest;

class CandidateFoundingInfoUpdateRequest extends FormRequest
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
            'gender' => ['required', 'in:male,female'],
            'maritial_status' => ['required', 'in:married,single'],
            'profession_id' => ['required', 'integer'],
            'status' => ['required', 'in:available,not_available'],
            'skill' => ['required'],
            'language' => ['required'],
            'bio' => ['required']
        ];
    }
}
