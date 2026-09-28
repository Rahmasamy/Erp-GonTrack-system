<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentRequest;
use App\Models\Payment;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    use ApiResponseTrait;
    public function index(Request $request)
{
    
    $id = $request->input('id');
    $paymentMethod = $request->input('payment_method');
    $amount = $request->input('amount');
    $pageId = $request->input('page_id');
    $accountId = $request->input('account_id');
    $campgian = $request->input('campgian');
    $clientsId = $request->input('clients_id');
    $managId = $request->input('manag_id');
    $adsId = $request->input('ads_id');
    $serviceId = $request->input('service_id');
    $adminsId = $request->input('admins_id');
    $createdAt = $request->input('created_at');
    $updatedAt = $request->input('updated_at');


    $query = Payment::query();

    if ($id) {
        $query->where('id', $id);
    }
    if ($paymentMethod) {
        $query->where('payment_method', 'like', '%' . $paymentMethod . '%');
    }
    if ($amount) {
        $query->where('amount', $amount);
    }
    if ($pageId) {
        $query->where('page_id', $pageId);
    }
    if ($accountId) {
        $query->where('account_id', $accountId);
    }
    if ($campgian) {
        $query->where('campgian', $campgian);
    }
    if ($clientsId) {
        $query->where('clients_id', $clientsId);
    }
    if ($managId) {
        $query->where('manag_id', $managId);
    }
    if ($adsId) {
        $query->where('ads_id', $adsId);
    }
    if ($serviceId) {
        $query->where('service_id', $serviceId);
    }
    if ($adminsId) {
        $query->where('admins_id', $adminsId);
    }
    if ($createdAt) {
        $query->whereDate('created_at', $createdAt);
    }
    if ($updatedAt) {
        $query->whereDate('updated_at', $updatedAt);
    }

    // Sort by clients_id in ascending order
    $payments = $query->orderBy('clients_id', 'asc')->get();

    if ($payments->isEmpty()) {
        return $this->errorResponse('No payments found.', 404);
    }

    return $this->successResponse($payments);
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(PaymentRequest $request)
    {
        //
        $account = Payment::create($request->validated());

        return $this->successResponse($account, 'payment created successfully.', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $account = Payment::find($id);

        if (!$account) {
            return $this->errorResponse('payment not found.', 404);
        }

        return $this->successResponse($account);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PaymentRequest $request, $id)
    {
        //
        $account = Payment::find($id);

        if (!$account) {
            return $this->errorResponse('payment not found.', 404);
        }
        $account->update($request->validated());

        return $this->successResponse($account, 'payment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $account = Payment::find($id);

        if (!$account) {
            return $this->errorResponse('payment not found.', 404);
        }

        $account->delete();

        return $this->successResponse(null, 'payment deleted successfully.');
    }
}
