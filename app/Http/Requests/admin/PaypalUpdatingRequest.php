<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PaypalUpdatingRequest extends FormRequest
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

            'paypal_status' => ['required', 'in:active,inactive'],
            'paypal_account_mode' => ['required', 'in:live,sandbox'],
            'paypal_country_name' => ['required'],
            'paypal_currency_name' => ['required'],
            'paypal_currency_rate' => ['required', 'numeric'],
            'paypal_client_id' => ['required'],
            'paypal_client_secret' => ['required'],
            'paypal_app_id' => ['required']
            
        ];
    }
}