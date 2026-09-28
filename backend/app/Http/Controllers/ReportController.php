<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReportRequest;

use App\Models\Report;
use App\Models\services;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    use ApiResponseTrait;
    public function index()
    {
        //
        $accounts = Report::all();

        if ($accounts->isEmpty()) {
            return $this->errorResponse( 'No reports found.', 404);
        }

        return $this->successResponse($accounts);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(ReportRequest $request)
    {
        //
        $account = Report::create($request->validated());

        return $this->successResponse($account, 'Report created successfully.', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $account = Report::find($id);

        if (!$account) {
            return $this->errorResponse('Report not found.', 404);
        }

        return $this->successResponse($account);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReportRequest $request, $id)
    {
        //
        $account = Report::find($id);

        if (!$account) {
            return $this->errorResponse('Report not found.', 404);
        }
        $account->update($request->validated());

        return $this->successResponse($account, 'Report updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $account = Report::find($id);

        if (!$account) {
            return $this->errorResponse( 'Report not found.', 404);
        }

        $account->delete();

        return $this->successResponse(null, message: 'Report deleted successfully.');
    }

}
