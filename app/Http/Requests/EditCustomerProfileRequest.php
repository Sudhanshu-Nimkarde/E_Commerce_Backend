<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class EditCustomerProfileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'      => 'required|string|max:255',
            'email'     => 'required|email',
            'contact'   => 'nullable|digits:10',
            'gender'    => 'required|in:Male,Female,Other',
            'user_name' => 'required|string|max:255',
            'address'   => 'nullable|string'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'      => 'Name is required',
            'email.required'     => 'Email is required',
            'email.email'        => 'Please enter valid email',
            'contact.digits'     => 'Enter valid contact number (10 digits)',
            'gender.required'    => 'Gender is required',
            'gender.in'          => 'Please select a valid gender',
            'user_name.required' => 'Please enter username'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errorCodes = [
            'email.required'     => 'EC_0012',
            'name.required'      => 'EC_0013',
            'email.email'        => 'EC_0014',
            'contact.digits'     => 'EC_0015',
            'gender.required'    => 'EC_0016',
            'gender.in'          => 'EC_0017',
            'user_name.required' => 'EC_0018',
        ];

        $failedRules = $validator->failed();

        $field = array_key_first($failedRules);
        $rule  = array_key_first($failedRules[$field]);

        $key = $field . '.' . strtolower($rule);

        throw new HttpResponseException(
            response()->json([
                'status'      => false,
                'status_code' => $errorCodes[$key] ?? 'EC_0001',
                'message'     => $validator->errors()->first(),
                // 'errors'      => $validator->errors()
            ], 400)
        );
    }
}