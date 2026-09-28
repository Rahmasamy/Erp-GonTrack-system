<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountRequest extends FormRequest
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
        $rules = [
            'client_id' => 'required|integer|exists:clinets,id',
            'account_name' => 'required|string|max:255|unique:acounts,account_name',
            'status'=>'required|string|max:255'
        ];

        // For update request, allow the same account_name if updating the same account
        if ($this->isMethod('patch') || $this->isMethod('put')) {
            $accountId = $this->route('acount');
            $rules['account_name'] .= ',' . $accountId;
        }

        return $rules;
    }

}
