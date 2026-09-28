<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClinetRequest;
use App\Models\Clinet;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class ClinetController extends Controller
{
    use ApiResponseTrait;
    public function index(Request $request)
{
    $query = Clinet::query();

    // Apply filters based on request parameters
    if ($request->has('id')) {
        $query->where('id', $request->input('id'));
    }

    if ($request->has('client_name')) {
        $query->where('client_name', 'like', '%' . $request->input('client_name') . '%');
    }

    if ($request->has('email')) {
        $query->where('email', 'like', '%' . $request->input('email') . '%');
    }

    if ($request->has('address')) {
        $query->where('address', 'like', '%' . $request->input('address') . '%');
    }

    if ($request->has('phone')) {
        $query->where('phone', 'like', '%' . $request->input('phone') . '%');
    }

    if ($request->has('taxes')) {
        $query->where('taxes', $request->input('taxes'));
    }

    if ($request->has('currency')) {
        $query->where('currency', $request->input('currency'));
    }

    if ($request->has('commission')) {
        $query->where('commission', $request->input('commission'));
    }

    // Retrieve the filtered results
    $clients = $query->get();

    if ($clients->isEmpty()) {
        return $this->errorResponse('No clients found.', 404);
    }

    return $this->successResponse($clients);
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClinetRequest $request)
    {
        try {
            $account = Clinet::create($request->validated());
            if ($account) {
                return $this->successResponse($account, 'Client created successfully.', 201);
            }
              return $this->errorResponse('Not valid creation', 404)  ;
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $account = Clinet::find($id);

        if (!$account) {
            return $this->errorResponse('client not found.', 404);
        }

        return $this->successResponse($account);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClinetRequest $request, $id)
    {
        //
        $account = Clinet::find($id);

        if (!$account) {
            return $this->errorResponse('client not found.', 404);
        }
        $account->update($request->validated());

        return $this->successResponse($account, 'client updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $account = Clinet::find($id);

        if (!$account) {
            return $this->errorResponse('client not found.', 404);
        }

        $account->delete();

        return $this->successResponse(null, 'client deleted successfully.');
    }
}
