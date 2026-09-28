<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
            'admin_name' => 'required|string|max:255',
            'admin_email' => 'required|email|unique:admins,admin_email',
        ];
    }
    public function messages(): array
    {
        return [
            'admin_name.required' => 'Admin name is required.',
            'admin_name.string' => 'Admin name must be a valid string.',
            'admin_name.max' => 'Admin name cannot exceed 255 characters.',
            'admin_email.required' => 'Admin email is required.',
            'admin_email.email' => 'Admin email must be a valid email address.',
            'admin_email.unique' => 'This email is already registered.',
        ];
    }
}
