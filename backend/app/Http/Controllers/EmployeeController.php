<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmplyeeRequest;
use App\Models\Employee;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    use ApiResponseTrait;
    public function index(Request $request)
{
    $query = Employee::query();

    if ($request->has('id')) {
        $query->where('id', $request->input('id'));
    }

    if ($request->has('name')) {
        $query->where('name', 'like', '%' . $request->input('name') . '%');
    }

    if ($request->has('mobile_phone')) {
        $query->where('mobile_phone', $request->input('mobile_phone'));
    }

    if ($request->has('address')) {
        $query->where('address', 'like', '%' . $request->input('address') . '%');
    }

    if ($request->has('position')) {
        $query->where('position', 'like', '%' . $request->input('position') . '%');
    }

    if ($request->has('date_of_birth')) {
        $query->whereDate('date_of_birth', $request->input('date_of_birth'));
    }


    $employees = $query->get();

    if ($employees->isEmpty()) {
        return $this->errorResponse('No Employees found.', 404);
    }

    return $this->successResponse($employees);
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(EmplyeeRequest $request)
    {
        //
        $account = Employee::create($request->validated());

        return $this->successResponse($account,  'employee created successfully.', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $account = Employee::find($id);

        if (!$account) {
            return $this->errorResponse('employee not found.', 404);
        }

        return $this->successResponse($account);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmplyeeRequest $request, $id)
    {
        //
        $account = Employee::find($id);
        if (!$account) {
            return $this->errorResponse('employee not found.', 404);
        }
        $account->update($request->validated());

        return $this->successResponse($account, 'employee updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $account = Employee::find($id);

        if (!$account) {
            return $this->errorResponse('employee not found.', 404);
        }

        $account->delete();

        return $this->successResponse(null, 'employee deleted successfully.');
    }
}
