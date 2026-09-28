<?php

namespace App\Http\Controllers;

use App\Http\Requests\CampainRequest;
use App\Models\Acount;
use App\Models\Campgian;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class CampgianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use ApiResponseTrait;
    public function index(Request $request)
    {
        $query = Campgian::query();

        if ($request->has('id')) {
            $query->where('id', $request->input('id'));
        }

        if ($request->has('campaign_name')) {
            $query->where('campaign_name', 'like', '%' . $request->input('campaign_name') . '%');
        }

        if ($request->has('status')) {
            $query->where('status', $request->input('status'));
        }

        if ($request->has('camp_date')) {
            $query->whereDate('camp_date', $request->input('camp_date'));
        }

        if ($request->has('account_id')) {
            $query->where('account_id', $request->input('account_id'));
        }
        if ($request->has('acount_id')) {
            $query->where('acount_id', $request->input('account_id'));
        }

        $query->orderBy('account_id', 'asc');
        $query->orderBy('acount_id', 'asc');


        // $campaigns = $query->paginate(5);
        $campaigns = $query->get();

        if ($campaigns->isEmpty()) {
            return $this->errorResponse('No campaigns found.', 404);
        }

        return $this->successResponse($campaigns);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(CampainRequest $request)
    {
        //
        $account = Campgian::create($request->validated());

        return $this->successResponse($account, 'Campiagn created successfully.', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $account = Campgian::find($id);

        if (!$account) {
            return $this->errorResponse('Campgian not found.', 404);
        }

        return $this->successResponse($account);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CampainRequest $request, $id)
    {
        //
        $account = Campgian::find($id);
        if (!$account) {
            return $this->errorResponse('Campgian not found.', 404);
        }
        $account->update($request->validated());

        return $this->successResponse($account, 'Campgian updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $account = Campgian::find($id);

        if (!$account) {
            return $this->errorResponse('Campgian not found.', 404);
        }

        $account->delete();

        return $this->successResponse(null, 'Campgian deleted successfully.');
    }
    public function getCampgiansByAccId($accountId)
    {

        $campgians = Campgian::where('acount_id', $accountId)->get();
        if (!$campgians) {
            return $this->errorResponse('Campgians for that Account not found.', 404);
        }
        return $this->successResponse($campgians, 'Campgian deleted successfully.');

    }

}
