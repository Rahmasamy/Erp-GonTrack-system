<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DailyExpenseRequest extends FormRequest
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
            'expenses_date' => 'required|date',
            'daily_expense' => 'required|numeric|min:0',
            'client_id' => 'required|exists:clinets,id',
            'acount_id' => 'required|exists:acounts,id',
            'page_id' => 'required|exists:pages,id',
            'campgian_id' => 'required|exists:campgians,id',
        ];
    }

    public function messages()
    {
        return [
            'expenses_date.required' => 'The expenses date is required.',
            'expenses_date.date' => 'The expenses date must be a valid date.',
            'daily_expense.required' => 'The daily expense is required.',
            'daily_expense.numeric' => 'The daily expense must be a number.',
            'daily_expense.min' => 'The daily expense must be at least 0.',
            'client_id.required' => 'The client ID is required.',
            'client_id.exists' => 'The selected client does not exist.',
            'acount_id.required' => 'The account ID is required.',
            'acount_id.exists' => 'The selected account does not exist.',
            'page_id.required' => 'The page ID is required.',
            'page_id.exists' => 'The selected page does not exist.',
            'campgian_id.required' => 'The campaign ID is required.',
            'campgian_id.exists' => 'The selected campaign does not exist.',
        ];
    }
}
