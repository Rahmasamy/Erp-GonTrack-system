<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExpenseRequest;
use App\Models\Expenses;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class ExpensesController extends Controller
{
    use ApiResponseTrait;
    public function index(Request $request)
    {
        $query = Expenses::query();
        if ($request->has('id')) {
            $query->where('id', $request->input('id'));
        }

        if ($request->has('netSalary')) {
            $query->where('netSalary', $request->input('netSalary'));
        }

        if ($request->has('kpis')) {
            $query->where('kpis', 'like', '%' . $request->input('kpis') . '%');
        }

        if ($request->has('overtime_byhour')) {
            $query->where('overtime_byhour', $request->input('overtime_byhour'));
        }

        if ($request->has('numberofdays')) {
            $query->where('numberofdays', $request->input('numberofdays'));
        }

        if ($request->has('salary_per_day')) {
            $query->where('salary_per_day', $request->input('salary_per_day'));
        }

        if ($request->has('absence_per_hour')) {
            $query->where('absence_per_hour', $request->input('absence_per_hour'));
        }

        if ($request->has('insurance')) {
            $query->where('insurance', $request->input('insurance'));
        }

        if ($request->has('salary_deduction')) {
            $query->where('salary_deduction', $request->input('salary_deduction'));
        }

        if ($request->has('emp_id')) {
            $query->where('emp_id', $request->input('emp_id'));
        }

        // Retrieve the filtered results
        $expenses = $query->get();

        if ($expenses->isEmpty()) {
            return $this->errorResponse('No expenses found.', 404);
        }

        return $this->successResponse($expenses);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(ExpenseRequest $request)
    {
        //
        $account = Expenses::create($request->validated());

        return $this->successResponse($account,  'expense created successfully.', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $account = Expenses::find($id);

        if (!$account) {
            return $this->errorResponse('expense not found.', 404);
        }

        return $this->successResponse($account);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ExpenseRequest $request, $id)
    {
        //
        $account = Expenses::find($id);
        if (!$account) {
            return $this->errorResponse('expense not found.', 404);
        }
        $account->update($request->validated());

        return $this->successResponse($account, 'expense updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $account = Expenses::find($id);

        if (!$account) {
            return $this->errorResponse('expense not found.', 404);
        }

        $account->delete();

        return $this->successResponse(null, 'expense deleted successfully.');
    }
}
