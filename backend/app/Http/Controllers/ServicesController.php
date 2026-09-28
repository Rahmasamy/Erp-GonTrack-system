<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Models\Managment;
use App\Models\services;
use Illuminate\Http\Request;
use App\Traits\ApiResponseTrait;
class ServicesController extends Controller
{
    //
    use ApiResponseTrait;
    public function index(Request $request)
{
 
    $id = $request->input('id');
    $servicesName = $request->input('services_name');
    $serviceAmount = $request->input('service_amount');
    $invoiceNumber = $request->input('invoice_number');
    $clientId = $request->input('client_id');
    $query = Services::query();

    if ($id) {
        $query->where('id', $id);
    }
    if ($servicesName) {
        $query->where('services_name', 'like', '%' . $servicesName . '%');
    }
    if ($serviceAmount) {
        $query->where('service_amount', $serviceAmount);
    }
    if ($invoiceNumber) {
        $query->where('invoice_number', $invoiceNumber);
    }
    if ($clientId) {
        $query->where('client_id', $clientId);
    }

    $services = $query->get();

    if ($services->isEmpty()) {
        return $this->errorResponse('No services found.', 404);
    }

    return $this->successResponse($services);
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceRequest $request)
    {
        //
        $account = services::create($request->validated());

        return $this->successResponse($account, 'service created successfully.', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $account = services::find($id);

        if (!$account) {
            return $this->errorResponse('service not found.', 404);
        }

        return $this->successResponse($account);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceRequest $request, $id)
    {
        //
        $account = services::find($id);

        if (!$account) {
            return $this->errorResponse('service not found.', 404);
        }
        $account->update($request->validated());

        return $this->successResponse($account, 'service updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $account = services::find($id);

        if (!$account) {
            return $this->errorResponse('service not found.', 404);
        }

        $account->delete();

        return $this->successResponse(null, message: 'service deleted successfully.');
    }
    public function getAmountServiceByClientId($clientId){
     $sum=services::where('clinet_id',$clientId)->sum('service_amount');
     return $sum;
    }
}
