<?php

namespace App\Http\Controllers;

use App\Http\Requests\ManagemntRequest;
use App\Models\Managment;
use Illuminate\Http\Request;
use App\Traits\ApiResponseTrait;
class ManagmentController extends Controller
{
    //
    use ApiResponseTrait;
    public function index(Request $request)
{
    $query = Managment::query();

   
    if ($request->has('id')) {
        $query->where('id', $request->input('id'));
    }

    if ($request->has('managment_name')) {
        $query->where('managment_name', 'like', '%' . $request->input('managment_name') . '%');
    }

    if ($request->has('managment_amount')) {
        $query->where('managment_amount', $request->input('managment_amount'));
    }

    if ($request->has('invoice_number')) {
        $query->where('invoice_number', $request->input('invoice_number'));
    }

    if ($request->has('clinet_id')) {
        $query->where('clinet_id', $request->input('clinet_id'));
    }


    $query->orderBy('clinet_id', 'asc');

    $Managments = $query->get();

    if ($Managments->isEmpty()) {
        return $this->errorResponse('No Managments found.', 404);
    }

    return $this->successResponse($Managments);
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(ManagemntRequest $request)
    {
        //
        $Managment = Managment::create($request->validated());

        return $this->successResponse($Managment, 'Managment created successfully.', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $Managment = Managment::find($id);

        if (!$Managment) {
            return $this->errorResponse('Managment not found.', 404);
        }

        return $this->successResponse($Managment);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ManagemntRequest $request, $id)
    {
        //
        $Managment = Managment::find($id);

        if (!$Managment) {
            return $this->errorResponse('Managment not found.', 404);
        }
        $Managment->update($request->validated());

        return $this->successResponse($Managment, 'Managment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $Managment = Managment::find($id);

        if (!$Managment) {
            return $this->errorResponse('Managment not found.', 404);
        }

        $Managment->delete();

        return $this->successResponse(null, 'Managment deleted successfully.');
    }
    public function getAmountManagmByClientId($clientId){
        $sum=Managment::where('clinet_id',$clientId)->sum(column: 'managment_amount');
        return $sum;
       }
}
