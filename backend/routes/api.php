<?php

use App\Http\Controllers\AcountController;
use App\Http\Controllers\AdController;
use App\Http\Controllers\CampgianController;
use App\Http\Controllers\ClinetController;
use App\Http\Controllers\DailyExpensiveController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\ManagmentController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ServicesController;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// hello
// Route::get('employees', [EmployeeController::class, 'index']);
Route::group(['middleware' => ['auth:sanctum', 'role:hr']], function () {
    Route::get('employees', [EmployeeController::class, 'index']);
    Route::get('employee/show/{id}', [EmployeeController::class, 'show']);
    Route::post('employee/store', [EmployeeController::class, 'store']);
    Route::put('employee/update/{id}', [EmployeeController::class, 'update']);
    Route::delete('employee/delete/{id}', [EmployeeController::class, 'destroy']);

});
Route::group(['middleware' => ['auth:sanctum', 'role:admin']], function () {
    Route::get('account', [AcountController::class, 'index']);
    Route::get('account/show/{id}', [AcountController::class, 'show']);
    Route::post('account/store', [AcountController::class, 'store']);
    Route::put('account/update/{id}', [AcountController::class, 'update']);
    Route::delete('account/delete/{id}', [AcountController::class, 'destroy']);
    Route::get('getAllAccountsWithCampgians', [AcountController::class, 'getAllAccountsWithCampgians']);
    Route::get('getAcountWithCampgians/{AccountId}', [AcountController::class, 'getAcountWithCampgians']);



    Route::get('campgian', [CampgianController::class, 'index']);
    Route::get('campgian/show/{id}', [CampgianController::class, 'show']);
    Route::post('campgian/store', [CampgianController::class, 'store']);
    Route::put('campgian/update/{id}', [CampgianController::class, 'update']);
    Route::delete('campgian/delete/{id}', [CampgianController::class, 'destroy']);
    Route::get('CampgiansforAccount/{accountId}', action: [CampgianController::class, 'getCampgiansByAccId']);

    Route::get('client', [ClinetController::class, 'index']);
    Route::get('client/show/{id}', action: [ClinetController::class, 'show']);
    Route::post('client/store', [ClinetController::class, 'store']);
    Route::put('client/update/{id}', [ClinetController::class, 'update']);
    Route::delete('client/delete/{id}', [ClinetController::class, 'destroy']);


    Route::get('pages', [PageController::class, 'index']);
    Route::get('pages/show/{id}', [PageController::class, 'show']);
    Route::post('pages/store', [PageController::class, 'store']);
    Route::put('pages/update/{id}', [PageController::class, 'update']);
    Route::delete('pages/delete/{id}', [PageController::class, 'destroy']);

    Route::get('dailyExpenses', [DailyExpensiveController::class, 'index']);
    Route::get('dailyExpenses/show/{id}', [DailyExpensiveController::class, 'show']);
    Route::post('dailyExpenses/store', [DailyExpensiveController::class, 'store']);
    Route::put('dailyExpenses/update/{id}', [DailyExpensiveController::class, 'update']);
    Route::delete('dailyExpenses/delete/{id}', [DailyExpensiveController::class, 'destroy']);

    Route::get('dailyExpenses', [DailyExpensiveController::class, 'index']);
    Route::get('dailyExpenses/show/{id}', [DailyExpensiveController::class, 'show']);
    Route::post('dailyExpenses/store', [DailyExpensiveController::class, 'store']);
    Route::put('dailyExpenses/update/{id}', [DailyExpensiveController::class, 'update']);
    Route::delete('dailyExpenses/delete/{id}', [DailyExpensiveController::class, 'destroy']);

    Route::get('Expenses', [ExpensesController::class, 'index']);
    Route::get('Expenses/show/{id}', [ExpensesController::class, 'show']);
    Route::post('Expenses/store', [ExpensesController::class, 'store']);
    Route::put('Expenses/update/{id}', [ExpensesController::class, 'update']);
    Route::delete('Expenses/delete/{id}', [ExpensesController::class, 'destroy']);

    Route::get('payment', [PaymentController::class, 'index']);
    Route::get('payment/show/{id}', [PaymentController::class, 'show']);
    Route::post('payment/store', [PaymentController::class, 'store']);
    Route::put('payment/update/{id}', [PaymentController::class, 'update']);
    Route::delete('payment/delete/{id}', [PaymentController::class, 'destroy']);


    Route::get('managments', [ManagmentController::class, 'index']);
    Route::get('managments/show/{id}', [ManagmentController::class, 'show']);
    Route::post('managments/store', [ManagmentController::class, 'store']);
    Route::put('managments/update/{id}', [ManagmentController::class, 'update']);
    Route::delete('managments/delete/{id}', [ManagmentController::class, 'destroy']);

    Route::get('services', [ServicesController::class, 'index']);
    Route::get('services/show/{id}', [ServicesController::class, 'show']);
    Route::post('services/store', [ServicesController::class, 'store']);
    Route::put('services/update/{id}', [ServicesController::class, 'update']);
    Route::delete('services/delete/{id}', [ServicesController::class, 'destroy']);


    Route::get('ads', [AdController::class, 'index']);
    Route::get('ads/show/{id}', [AdController::class, 'show']);
    Route::post('ads/store', [AdController::class, 'store']);
    Route::put('ads/update/{id}', [AdController::class, 'update']);
    Route::delete('ads/delete/{id}', [AdController::class, 'destroy']);





});

Route::group(['middleware' => ['auth:sanctum', 'role:super admin']], function () {
    Route::get('account', [AcountController::class, 'index']);
    Route::get('account/show/{id}', [AcountController::class, 'show']);
    Route::post('account/store', [AcountController::class, 'store']);
    Route::put('account/update/{id}', [AcountController::class, 'update']);
    Route::delete('account/delete/{id}', [AcountController::class, 'destroy']);
    Route::get('getAllAccountsWithCampgians', [AcountController::class, 'getAllAccountsWithCampgians']);
    Route::get('getAcountWithCampgians/{AccountId}', [AcountController::class, 'getAcountWithCampgians']);


    Route::get('campgian', [CampgianController::class, 'index']);
    Route::get('campgian/show/{id}', [CampgianController::class, 'show']);
    Route::post('campgian/store', [CampgianController::class, 'store']);
    Route::put('campgian/update/{id}', [CampgianController::class, 'update']);
    Route::delete('campgian/delete/{id}', [CampgianController::class, 'destroy']);
    Route::get('CampgiansforAccount/{accountId}', action: [CampgianController::class, 'getCampgiansByAccId']);

    Route::get('client', action: [ClinetController::class, 'index']);
    Route::get('client/show/{id}', action: [ClinetController::class, 'show']);
    Route::post('client/store', [ClinetController::class, 'store']);
    Route::put('client/update/{id}', [ClinetController::class, 'update']);
    Route::delete('client/delete/{id}', [ClinetController::class, 'destroy']);


    Route::get('pages', [PageController::class, 'index']);
    Route::get('pages/show/{id}', [PageController::class, 'show']);
    Route::post('pages/store', [PageController::class, 'store']);
    Route::put('pages/update/{id}', [PageController::class, 'update']);
    Route::delete('pages/delete/{id}', [PageController::class, 'destroy']);

    Route::get('dailyExpenses', [DailyExpensiveController::class, 'index']);
    Route::get('dailyExpenses/show/{id}', [DailyExpensiveController::class, 'show']);
    Route::post('dailyExpenses/store', [DailyExpensiveController::class, 'store']);
    Route::put('dailyExpenses/update/{id}', [DailyExpensiveController::class, 'update']);
    Route::delete('dailyExpenses/delete/{id}', [DailyExpensiveController::class, 'destroy']);



    Route::get('getTotalDailyExpense/{id}', [DailyExpensiveController::class, 'getTotalDailyExpense']);
    Route::get('getTotalDailyExpensesforAll', [DailyExpensiveController::class, 'getTotalDailyExpensesforAll']);
    Route::get('getTotalDailyExpWithoutCommisionl/{id}', [DailyExpensiveController::class, 'getTotalDailyExpWithoutCommision']);
    Route::get('getClientBalance/{id}', [DailyExpensiveController::class, 'getClientBalance']);
    Route::get('Report/{id}', [DailyExpensiveController::class, 'Report']);
    Route::get('Dashboard', [DailyExpensiveController::class, 'Dashboard']);


    Route::get('Expenses', [ExpensesController::class, 'index']);
    Route::get('Expenses/show/{id}', [ExpensesController::class, 'show']);
    Route::post('Expenses/store', [ExpensesController::class, 'store']);
    Route::put('Expenses/update/{id}', [ExpensesController::class, 'update']);
    Route::delete('Expenses/delete/{id}', [ExpensesController::class, 'destroy']);

    Route::get('payment', [PaymentController::class, 'index']);
    Route::get('payment/show/{id}', [PaymentController::class, 'show']);
    Route::post('payment/store', [PaymentController::class, 'store']);
    Route::put('payment/update/{id}', [PaymentController::class, 'update']);
    Route::delete('payment/delete/{id}', [PaymentController::class, 'destroy']);


    Route::get('managments', [ManagmentController::class, 'index']);
    Route::get('managments/show/{id}', [ManagmentController::class, 'show']);
    Route::post('managments/store', [ManagmentController::class, 'store']);
    Route::put('managments/update/{id}', [ManagmentController::class, 'update']);
    Route::delete('managments/delete/{id}', [ManagmentController::class, 'destroy']);
    Route::get('getAmountManagmByClientId', [ManagmentController::class, 'getAmountManagmByClientId']);


    Route::get('services', [ServicesController::class, 'index']);
    Route::get('services/show/{id}', [ServicesController::class, 'show']);
    Route::post('services/store', [ServicesController::class, 'store']);
    Route::put('services/update/{id}', [ServicesController::class, 'update']);
    Route::delete('services/delete/{id}', [ServicesController::class, 'destroy']);
    Route::get('getAmountServiceByClientId', [ServicesController::class, 'getAmountServiceByClientId']);



    Route::get('ads', [AdController::class, 'index']);
    Route::get('ads/show/{id}', [AdController::class, 'show']);
    Route::post('ads/store', [AdController::class, 'store']);
    Route::put('ads/update/{id}', [AdController::class, 'update']);
    Route::delete('ads/delete/{id}', [AdController::class, 'destroy']);
    Route::get('getAmountAdsByClientId', [AdController::class, 'getAmountAdsByClientId']);




});
Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
