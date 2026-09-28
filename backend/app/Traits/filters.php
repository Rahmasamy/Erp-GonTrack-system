<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
trait filters {
    public function filterById(Request $request,$query){
        if ($request->has('id')) {
            $query->where('id', $request->input('id'));
        }
    return $query;

    }
    public function filterByStatus(Request $request,$query){
        if ($request->has('status')) {
            $query->where('status', $request->input('status'));
        }


    }
    public function filterByAccountName(Request $request,$query){
        if ($request->has('account_name')) {
            $query->where('account_name', 'like', '%' . $request->input('account_name') . '%');
        }


    }public function filterByClientId(Request $request,$query){
        if ($request->has('client_id')) {
            $query->where('client_id', $request->input('client_id'));
        }
    }
}
