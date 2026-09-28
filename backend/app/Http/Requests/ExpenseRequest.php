<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExpenseRequest extends FormRequest
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
            'netSalary' => 'required|numeric',
            'kpis' => 'nullable|numeric',
            'overtime_byhour' => 'nullable|numeric',
            'numberofdays' => 'required|integer',
            'salary_per_day' => 'required|numeric',
            'absence_per_hour' => 'nullable|numeric',
            'insurance' => 'nullable|string',
            'salary_deduction' => 'nullable|numeric',
            'emp_id' => 'required|exists:employees,id',
        ];
    }
    public function messages(): array
{
    return [
        'netSalary.required' => 'Net salary is required.',
        'netSalary.numeric' => 'Net salary must be a numeric value.',

        'kpis.numeric' => 'KPIs must be a numeric value.',

        'overtime_byhour.numeric' => 'Overtime by hour must be a numeric value.',

        'numberofdays.required' => 'Number of days is required.',
        'numberofdays.integer' => 'Number of days must be an integer.',

        'salary_per_day.required' => 'Salary per day is required.',
        'salary_per_day.numeric' => 'Salary per day must be a numeric value.',

        'absence_per_hour.numeric' => 'Absence per hour must be a numeric value.',

        'insurance.string' => 'Insurance must be a string.',

        'salary_deduction.numeric' => 'Salary deduction must be a numeric value.',

        'emp_id.required' => 'Employee ID is required.',
        'emp_id.exists' => 'The selected employee ID is invalid.',
    ];
}

}
