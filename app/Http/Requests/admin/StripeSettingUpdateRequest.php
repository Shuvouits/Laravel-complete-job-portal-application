<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class StripeSettingUpdateRequest extends FormRequest
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
            'stripe_status' => ['required', 'in:active,inactive'],
            'stripe_country_name' => ['required'],
            'stripe_currency_name' => ['required'],
            'stripe_currency_rate' => ['required', 'numeric'],
            'stripe_publishable_key' => ['required'],
            'stripe_secret_key' => ['required']
        ];
    }
}
