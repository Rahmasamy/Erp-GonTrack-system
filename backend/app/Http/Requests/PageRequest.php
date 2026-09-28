<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
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
            'page_name' => 'required|string|max:255|unique:pages,page_name',
            'account_id' => 'required|exists:acounts,id',
        ];
    }
    public function messages(): array
    {
        return [
            'page_name.required' => 'The page name is required.',
            'page_name.string' => 'The page name must be a valid string.',
            'page_name.max' => 'The page name cannot exceed 255 characters.',
            'page_name.unique' => 'The page name has already been taken. Please choose a different name.',
            'account_id.required' => 'The account ID is required.',
            'account_id.exists' => 'The specified account ID does not exist.',
        ];
    }
}
