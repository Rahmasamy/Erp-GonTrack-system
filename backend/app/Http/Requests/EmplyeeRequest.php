<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmplyeeRequest extends FormRequest
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
            'date-of-birth' => 'required|date',
            'name' => 'required|string|max:255',
            'mobile_phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'position' => 'required|string|max:100',

        ];
    }
    public function messages(): array
    {
        return [
            'date-of-birth.required' => 'Date of birth is required.',
            'date-of-birth.date' => 'Date of birth must be a valid date.',
            'name.required' => 'Name is required.',
            'name.string' => 'Name must be a string.',
            'name.max' => 'Name may not be greater than 255 characters.',
            'mobile_phone.required' => 'Mobile phone number is required.',
            'mobile_phone.string' => 'Mobile phone must be a string.',
            'mobile_phone.max' => 'Mobile phone may not be greater than 15 characters.',
            'address.required' => 'Address is required.',
            'address.string' => 'Address must be a string.',
            'address.max' => 'Address may not be greater than 255 characters.',
            'position.required' => 'Position is required.',
            'position.string' => 'Position must be a string.',
            'position.max' => 'Position may not be greater than 100 characters.',
        ];
    }
}
