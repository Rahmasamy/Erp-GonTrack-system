<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ManagemntRequest extends FormRequest
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

    public function rules()
    {
        return [
            'managment_name' => 'required|string|max:255',
            'managment_amount' => 'required|numeric|min:0',
            'invoice_number' => 'required|integer|min:1',
            'clinet_id'=>'required|exists:clinets,id'
        ];
    }
    public function messages()
    {
        return [
            'managment_name.required' => 'The management name is required.',
            'managment_name.string' => 'The management name must be a string.',
            'managment_name.max' => 'The management name cannot exceed 255 characters.',
            'managment_amount.required' => 'The management amount is required.',
            'managment_amount.numeric' => 'The management amount must be a number.',
            'managment_amount.min' => 'The management amount must be at least 0.',
            'invoice_number.required' => 'The invoice number is required.',
            'invoice_number.integer' => 'The invoice number must be an integer.',
            'invoice_number.min' => 'The invoice number must be at least 1.',
            'clinet_id.required' => 'The client ID is required.',
            'clinet_id.exists' => 'The selected client does not exist.',
        ];
    }
}
