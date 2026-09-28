<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportRequest extends FormRequest
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
            'account_id' => 'required|exists:acounts,id',
            'campaign_id' => 'required|exists:campgians,id',
            'commissions' => 'required|numeric|min:0',
        ];
    }
    public function messages(): array
    {
        return [
            'account_id.required' => 'The account ID is required.',
            'account_id.exists' => 'The specified account ID does not exist.',
            'campaign_id.required' => 'The campaign ID is required.',
            'campaign_id.exists' => 'The specified campaign ID does not exist.',
            'commissions.required' => 'The commissions field is required.',
            'commissions.numeric' => 'The commissions must be a valid number.',
            'commissions.min' => 'The commissions must be at least 0.',
        ];
    }
}
