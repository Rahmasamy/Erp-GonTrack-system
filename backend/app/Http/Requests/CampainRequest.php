<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CampainRequest extends FormRequest
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
            //
            'campagian_name' => 'required|unique:campgians,campagian_name|string|max:255',
            'camp_date' => 'required|date',
            'acount_id' => 'required|exists:acounts,id',
        ];
    }
    public function messages(): array
    {
        return [
            'campagian_name.required' => 'The campaign name is required.',
            'campagian_name.unique' => 'The campaign name has already been taken. Please choose a different name.',
            'campagian_name.string' => 'The campaign name must be a valid string.',
            'campagian_name.max' => 'The campaign name cannot exceed 255 characters.',
            'camp_date.required' => 'The campaign date is required.',
            'camp_date.date' => 'The campaign date must be a valid date format.',
            'acount_id.required' => 'The account ID is required.',
            'acount_id.exists' => 'The specified account ID does not exist in our records.',
        ];
    }
}
