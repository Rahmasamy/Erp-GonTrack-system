<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdRequest;
use App\Models\Ad;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class AdController extends Controller
{
    //
    use ApiResponseTrait;
    public function index(Request $request)
    {
        $query = Ad::query();
        if ($request->has('id')) {
            $query->where('id', $request->input('id'));
        }

        if ($request->has('ads_name')) {
            $query->where('ads_name', 'like', '%' . $request->input('ads_name') . '%');
        }

        if ($request->has('ads_amount')) {
            $query->where('ads_amount', $request->input('ads_amount'));
        }

        if ($request->has('invoice_number')) {
            $query->where('invoice_number', $request->input('invoice_number'));
        }

        if ($request->has('client_id')) {
            $query->where('client_id', $request->input('client_id'));
        }

        $ads = $query->get();

        if ($ads->isEmpty()) {
            return $this->errorResponse('No ads found.', 404);
        }

        return $this->successResponse($ads);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdRequest $request)
    {
        //
        $ad = Ad::create($request->validated());

        return $this->successResponse($ad, 'Ad created successfully.', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $ad = Ad::find($id);

        if (!$ad) {
            return $this->errorResponse('Ad not found.', 404);
        }

        return $this->successResponse($ad);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdRequest $request, $id)
    {
        //
        $ad = Ad::find($id);

        if (!$ad) {
            return $this->errorResponse('Ad not found.', 404);
        }
        $ad->update($request->validated());

        return $this->successResponse($ad, 'Ad updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $ad = Ad::find($id);

        if (!$ad) {
            return $this->errorResponse('Ad not found.', 404);
        }

        $ad->delete();

        return $this->successResponse(null, 'Ad deleted successfully.');
    }
    public function getAmountAdsByClientId($clientId){
        $sum=Ad::where('clinet_id',$clientId)->sum(column: 'ads_amount');
        return $sum;
       }
}
