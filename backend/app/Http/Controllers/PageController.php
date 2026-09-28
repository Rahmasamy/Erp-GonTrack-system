<?php

namespace App\Http\Controllers;

use App\Http\Requests\PageRequest;
use App\Models\Page;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class PageController extends Controller
{
    use ApiResponseTrait;
    public function index(Request $request)
{

    $id = $request->input('id');
    $pageName = $request->input('page_name');
    $accountId = $request->input('account_id');


    $query = Page::query();

    if ($id) {
        $query->where('id', $id);
    }

    if ($pageName) {
        $query->where('page_name', 'like', '%' . $pageName . '%');
    }

    if ($accountId) {
        $query->where('account_id', $accountId);
    }

    // Sort by account_id in descending order
    $pages = $query->orderBy('account_id', 'asc')->get();

    if ($pages->isEmpty()) {
        return $this->errorResponse('No pages found.', 404);
    }

    return $this->successResponse($pages);
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(PageRequest $request)
    {
        //
        $account = Page::create($request->validated());

        return $this->successResponse($account, 'page created successfully.', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $account = Page::find($id);

        if (!$account) {
            return $this->errorResponse('page not found.', 404);
        }

        return $this->successResponse($account);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PageRequest $request, $id)
    {
        //
        $account = Page::find($id);

        if (!$account) {
            return $this->errorResponse('page not found.', 404);
        }
        $account->update($request->validated());

        return $this->successResponse($account, 'page updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $account = Page::find($id);

        if (!$account) {
            return $this->errorResponse('page not found.', 404);
        }

        $account->delete();

        return $this->successResponse(null, 'page deleted successfully.');
    }
}
