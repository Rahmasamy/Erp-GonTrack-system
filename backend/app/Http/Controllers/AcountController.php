<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountRequest;
use App\Models\Acount;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
class AcountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use ApiResponseTrait;
    public function index(Request $request)
{
    $query = Acount::query();
    if ($request->has('id')) {
        $query->where('id', $request->input('id'));
    }

    if ($request->has('account_name')) {
        $query->where('account_name', 'like', '%' . $request->input('account_name') . '%');
    }

    if ($request->has('status')) {
        $query->where('status', $request->input('status'));
    }

    if ($request->has('client_id')) {
        $query->where('client_id', $request->input('client_id'));
    }


    $accounts = $query->paginate(5);

    if ($accounts->isEmpty()) {
        return $this->errorResponse('No accounts found.', 404);
    }

    return $this->successResponse($accounts);
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(AccountRequest $request)
    {
        //
        $account = Acount::create($request->validated());

        return $this->successResponse($account, 'Account created successfully.', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $account = Acount::find($id);

        if (!$account) {
            return $this->errorResponse('Account not found.', 404);
        }

        return $this->successResponse($account);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AccountRequest $request, $id)
    {
        //
        $account = Acount::find($id);

        if (!$account) {
            return $this->errorResponse('Account not found.', 404);
        }
        $account->update($request->validated());

        return $this->successResponse($account, 'Account updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $account = Acount::find($id);

        if (!$account) {
            return $this->errorResponse('Account not found.', 404);
        }

        $account->delete();

        return $this->successResponse(null, 'Account deleted successfully.');
    }
    public function getAllAccountsWithCampgians()
    {
        $accounts = Acount::with('campgians')->paginate(5);;

        if ($accounts->isEmpty()) {
            return $this->errorResponse('Accounts not found.', 404);
        }

        return $this->successResponse($accounts, 'Accounts with campgians retrieved successfully.');
    }
    public function getAcountWithCampgians($AccountId)
{
    $accounts = Acount::where('id', $AccountId)
                        ->with('campgians')
                        ->paginate(5);

    if ($accounts->isEmpty()) {
        return $this->errorResponse('Accounts not found for the specified client.', 404);
    }

    return $this->successResponse($accounts, 'Accounts with campaigns retrieved successfully.');
}


}
