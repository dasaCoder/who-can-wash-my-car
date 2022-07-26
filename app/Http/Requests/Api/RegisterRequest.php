<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'username' => ['required', 'unique:users,username,'.$this->user],
            'email' => ['required', 'unique:users,email,'.$this->user],
            'phone' => ['required', 'unique:users,phone,'.$this->user],
            'password' => ['required', 'confirmed'],
            'account_type' => ['required'],

            'first_name' => ['required_if:account_type,==,Personal'],
            'last_name' => ['required_if:account_type,==,Personal'],

            'locations.*.location_name' => ['required_if:account_type,==,Personal'],
            'locations.*.line_1' => ['required_if:account_type,==,Personal'],
            'locations.*.line_2' => ['required_if:account_type,==,Personal'],
            'locations.*.city' => ['required_if:account_type,==,Personal'],
            'locations.*.state' => ['required_if:account_type,==,Personal'],
            'locations.*.country' => ['required_if:account_type,==,Personal'],
            'locations.*.postal_code' => ['required_if:account_type,==,Personal'],
            'locations.*.longitude' => ['required_if:account_type,==,Personal'],
            'locations.*.latitude' => ['required_if:account_type,==,Personal'],
            'locations.*.is_default_location' => ['required_if:account_type,==,Personal'],

            'business_type_id' => ['required_if:account_type,==,Business'],
            'business_name' => ['required_if:account_type,==,Business'],
            'company_reg_no' => ['required_if:account_type,==,Business'],
            'vat_no' => ['required_if:account_type,==,Business'],
            'brd' => ['required_if:account_type,==,Business'],
            'insurance' => ['required_if:account_type,==,Business'],

            'image' => ['nullable','image','mimes:jpeg,png,jpg,gif,svg','max:1024'],

            'services' => ['array'],

            'availabilities.*.date' => ['required','date_format:Y-m-d'],
            'availabilities.*.start' => ['required','date_format:H:i:s'],
            'availabilities.*.end' => ['required','date_format:H:i:s'],

            'vehicles.*.vehicle_category_id' => ['required','numeric'],
            'vehicles.*.registration_number' => ['required'],
            'vehicles.*.make' => ['required'],
            'vehicles.*.name' => ['required'],
            'vehicles.*.year_of_manufacture' => ['required','date_format:Y'],
            'vehicles.*.mot_expiry_date' => ['required','date_format:Y-m-d'],
            'vehicles.*.mot_status' => ['required'],
            'vehicles.*.tax_due_date' => ['required','date_format:Y-m-d'],
            'vehicles.*.tax_status' => ['required'],
            'vehicles.*.image' => ['nullable','image','mimes:jpeg,png,jpg,gif,svg','max:1024'],
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes(): array
    {
        return [];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [];
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param  Validator  $validator
     * @return void
     *
     * @throws HttpResponseException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'status' => 'error',
                'message' => 'The given data was invalid.',
                'data' => $validator->errors()->toArray(),
            ])
        );
    }
}
