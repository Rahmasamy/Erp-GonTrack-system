<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClinetRequest extends FormRequest
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
            'client_name' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email',
            'adress' => 'required|string|max:500',
            'phone' => 'required|digits_between:8,15',
            'taxes' => 'numeric|min:0',
            'curruancy' => 'numeric|max:3',
            'commission' => 'numeric|min:0|max:100',
        ];
    }

    public function messages(): array
    {
        return [
            'client_name.required' => 'The client name is required.',
            'client_name.string' => 'The client name must be a valid string.',
            'client_name.max' => 'The client name cannot exceed 255 characters.',
            'email.required' => 'The email address is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'This email is already in use. Please provide a different email.',
            'adress.required' => 'The address is required.',
            'adress.string' => 'The address must be a valid string.',
            'adress.max' => 'The address cannot exceed 500 characters.',
            
            'phone.required' => 'The phone number is required.',
            'phone.digits_between' => 'The phone number must be between 8 and 15 digits.',

            'taxes.numeric' => 'The taxes must be a numeric value.',
            'taxes.min' => 'The taxes cannot be negative.',


            'curruancy.numeric' => 'The currency must be a numeric number.',
            'curruancy.max' => 'The currency code cannot exceed 3 characters.',


            'commission.numeric' => 'The commission must be a numeric value.',
            'commission.min' => 'The commission cannot be negative.',
            'commission.max' => 'The commission cannot exceed 100 percent.',
        ];
    }
}
