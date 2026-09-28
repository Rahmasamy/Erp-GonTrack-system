<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
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
            'payment_type' => 'required|string|max:255',
            'payment_method' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'clients_id' => 'required|exists:clinets,id',
            'admins_id' => 'required|exists:admins,id',
        ];
    }
    public function messages(): array
    {
        return [
            'payment_type.required' => 'The payment type is required.',
            'payment_type.string' => 'The payment type must be a valid string.',
            'payment_type.max' => 'The payment type cannot exceed 255 characters.',
            'payment_method.required' => 'The payment method is required.',
            'payment_method.string' => 'The payment method must be a valid string.',
            'payment_method.max' => 'The payment method cannot exceed 255 characters.',
            'amount.required' => 'The amount is required.',
            'amount.numeric' => 'The amount must be a valid number.',
            'amount.min' => 'The amount must be at least 0.',
            'clients_id.required' => 'The client ID is required.',
            'clients_id.exists' => 'The specified client ID does not exist.',
            'admins_id.required' => 'The admin ID is required.',
            'admins_id.exists' => 'The specified admin ID does not exist.',
        ];
    }
}
