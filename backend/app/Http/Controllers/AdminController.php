<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use ApiResponseTrait;
    public function index()
    {
        //
        $accounts = Admin::all();

        if ($accounts->isEmpty()) {
            return $this->errorResponse('No admins found.', 404);
        }

        return $this->successResponse($accounts);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminRequest $request)
    {
        //
        $account = Admin::create($request->validated());

        return $this->successResponse($account, 'Admin created successfully.', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $account = Admin::find($id);

        if (!$account) {
            return $this->errorResponse('Admin not found.', 404);
        }

        return $this->successResponse($account);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminRequest $request, $id)
    {
        //
        $account = Admin::find($id);

        if (!$account) {
            return $this->errorResponse('Admin not found.', 404);
        }
        $account->update($request->validated());

        return $this->successResponse($account, 'Admin updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $account = Admin::find($id);

        if (!$account) {
            return $this->errorResponse('Admin not found.', 404);
        }

        $account->delete();

        return $this->successResponse(null, 'Admin deleted successfully.');
    }
}
