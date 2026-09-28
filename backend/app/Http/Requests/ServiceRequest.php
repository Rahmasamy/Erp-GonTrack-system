<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
            'services_name' => 'required|string|max:255',
            'service_amount' => 'required|numeric|min:0',
            'invoice_number' => 'required|integer|min:1',
            'clinet_id'=>'required|exists:clinets,id'
        ];
    }

    public function messages()
    {
        return [
            'services_name.required' => 'The service name is required.',
            'services_name.string' => 'The service name must be a string.',
            'services_name.max' => 'The service name cannot exceed 255 characters.',
            'service_amount.required' => 'The service amount is required.',
            'service_amount.numeric' => 'The service amount must be a number.',
            'service_amount.min' => 'The service amount must be at least 0.',
            'invoice_number.required' => 'The invoice number is required.',
            'invoice_number.integer' => 'The invoice number must be an integer.',
            'invoice_number.min' => 'The invoice number must be at least 1.',
            'clinet_id.required' => 'The client ID is required.',
            'clinet_id.exists' => 'The selected client does not exist.',
        ];
    }
}
