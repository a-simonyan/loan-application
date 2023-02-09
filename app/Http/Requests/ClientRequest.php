<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'nullable|required_without:phone_number|email|unique:clients',
            'phone_number' => 'nullable|required_without:email|numeric|min:9|unique:clients',
            'loan_type_cash' => 'nullable',
            'loan_type_home' => 'nullable',
            'loan_amount' => 'nullable|required_with:loan_type_cash|numeric',
            'property_value' => 'nullable|required_with:loan_type_home|numeric',
            'down_payment_amount' => 'nullable|required_with:loan_type_home|numeric',
        ];
    }
}
