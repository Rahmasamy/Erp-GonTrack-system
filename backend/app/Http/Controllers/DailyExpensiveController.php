<?php

namespace App\Http\Controllers;

use App\Http\Requests\DailyExpenseRequest;
use App\Models\Clinet;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Ad;
use App\Models\dailyExpensive;
use App\Models\Managment;
use App\Models\Payment;
use App\Models\services;

class DailyExpensiveController extends Controller
{
    //
    use ApiResponseTrait;
    public function index(Request $request)
    {
        $query = Ad::query();

        if ($request->has('id')) {
            $query->where('id', $request->input('id'));
        }

        if ($request->has('expenses_date')) {
            $query->whereDate('expenses_date', $request->input('expenses_date'));
        }

        if ($request->has('daily_expense')) {
            $query->where('daily_expense', $request->input('daily_expense'));
        }

        if ($request->has('client_id')) {
            $query->where('client_id', $request->input('client_id'));
        }

        if ($request->has('account_id')) {
            $query->where('account_id', $request->input('account_id'));
        }

        if ($request->has('page_id')) {
            $query->where('page_id', $request->input('page_id'));
        }

        if ($request->has('campaign_id')) {
            $query->where('campaign_id', $request->input('campaign_id'));
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
    public function store(DailyExpenseRequest $request)
    {
        //
        $ad = dailyExpensive::create($request->validated());

        return $this->successResponse($ad, 'Ad created successfully.', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $ad = dailyExpensive::find($id);

        if (!$ad) {
            return $this->errorResponse('Ad not found.', 404);
        }

        return $this->successResponse($ad);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DailyExpenseRequest $request, $id)
    {
        //
        $ad = dailyExpensive::find($id);

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
        $ad = dailyExpensive::find($id);

        if (!$ad) {
            return $this->errorResponse('Ad not found.', 404);
        }

        $ad->delete();

        return $this->successResponse(null, 'Ad deleted successfully.');
    }

    public function getTotalDailyExpense($clientId){
    $totalExpenses= DB::table('daily_expensives')
    ->where('client_id',$clientId)
    ->whereBetween('expenses_date', [now()->startOfMonth(), now()])
    ->sum(column: "daily_expense");
    return $totalExpenses;
    }
    public function getTotalDailyExpensesforAll(){
        $totalExpense=DB::table('daily_expensives')
        ->whereBetween('expenses_date', [now()->startOfMonth(), now()])
        ->sum("daily_expense");
       return $totalExpense;
    }
    public function getTotalDailyExpWithoutCommision($clientId){
     $client= Clinet::find($clientId);
     if (!$client) {
        return "Client not found.";
    }

    $taxRate = $client->taxes;
    $currencyRate = $client->curruancy;
    $commissionRate = $client->commission;
    $sum=$currencyRate+$taxRate+$commissionRate;
    $totalExpense=DB::table('daily_expensives')
    ->where('client_id',$clientId)
    ->whereBetween('expenses_date', [now()->startOfMonth(), now()])
    ->sum("daily_expense");
    $commissionValue=($sum/100)*$totalExpense;
    $totalExpenseWithoutCommission=$totalExpense-$commissionValue;
    return $totalExpenseWithoutCommission;
    }
    public function getClientBalance($clientId)
    {

        $totalPayments = Payment::where('clients_id', $clientId)->sum('amount');
        $totalServices = services::where( 'clinet_id', $clientId)->sum(column: 'service_amount');
        $totalAds = Ad::where('clinet_id', $clientId)->sum('ads_amount');
        $totalManagement = Managment::where( 'clinet_id', $clientId)->sum('managment_amount');
        $balance = $totalPayments - ($totalServices + $totalAds + $totalManagement);
        $client= Clinet::find($clientId);
        if (!$client) {
            return "Client not found.";
        }

        $clientName = $client->client_name;
        return response()->json([
            'clientName'=>$clientName,
            'balance' => $balance,
            'total_payments' => $totalPayments,
            'total_services' => $totalServices,
            'total_ads' => $totalAds,
            'total_management' => $totalManagement,
        ]);
    }
    public function Report($clientId){
        $client= Clinet::find($clientId);
        if (!$client) {
            return "Client not found.";
        }

        $clientName = $client->client_name;
        return response()->json(
            [
              "clientName"=> $clientName,
              "balance" => $this->getClientBalance($clientId),
              "getTotalDailyExpWithoutCommision" => $this->getTotalDailyExpWithoutCommision($clientId),
              "getTotalDailyExpense" => $this->getTotalDailyExpense($clientId),
              "getTotalDailyExpensesforAll" => $this->getTotalDailyExpensesforAll()

            ]
            );
    }
    public function Dashboard(){
        $clients = Clinet::all();
        if ($clients->isEmpty()) {
            return $this->errorResponse('No clients found.', 404);
        }

        $reports = [];
        foreach ($clients as $client) {
            $clientId = $client->id;
            $report = $this->Report($clientId);
            $reports[] = [
                'client_id' => $clientId,
                'client_name' => $client->client_name,
                'report' => $report
            ];
        }

        return response()->json($reports);
    }
}
