<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdRequest extends FormRequest
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
            'ads_name' => 'required|string|max:255',
            'invoice_number' => 'required|integer',
            'ads_amount' => 'required|numeric',
            'clinet_id'=>'required|exists:clinets,id'
        ];
    }
    public function messages()
    {
        return [
            'ads_name.required' => 'The ad name is required.',
            'ads_name.string' => 'The ad name must be a string.',
            'ads_name.max' => 'The ad name cannot exceed 255 characters.',
            'invoice_number.required' => 'the invoice number is required',
            'invoice_number.integer' => 'The invoice number must be an integer.',
            'ads_amount.required' => 'The ad amount is required.',
            'ads_amount.numeric' => 'The ad amount must be a number.',
            'ads_amount.min' => 'The ad amount must be at least 0.',
            'clinet_id.required' => 'The client ID is required.',
            'clinet_id.exists' => 'The selected client does not exist.',
        ];
    }
}
