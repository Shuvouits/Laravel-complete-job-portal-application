<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class PlanControlRequest extends FormRequest
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
            'label' => ['required', 'max:100'],
            'price' => ['required', 'integer', 'min:0'],
            'job_limit' => ['required', 'integer'],
            'featured_job_limit' => ['required', 'integer'],
            'highlight_job_limit' => ['required', 'integer'],
            'profile_verified' => ['required', 'boolean'],
            'recommended' => ['required', 'boolean'],
            'frontend_show' => ['required', 'boolean']
        ];
    }
}
