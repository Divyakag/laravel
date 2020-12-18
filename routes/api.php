<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productApI;
use App\Http\Controllers\productcontroller;
use App\Http\Controllers\filecontroller;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\EmployeeController;


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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::get('product',[productApI::class,'getData']);
// Route::post('product',[productApI::class,'add']);
// Route::put('product',[productApI::class,'update']);
// Route::delete('product/{id}',[productApI::class,'delete']);
// Route::get('search/{name}',[productApI::class,'search']);
// Route::get('filter/{min}/{max}',[productApI::class,'filter']);

Route::get('product/{min}/{max}',[productcontroller::class,'filter']);
Route::apiResource("product",productcontroller::class);
Route::post('upload',[filecontroller::class,'upload']);
Route::get("export-excel",[EmployeeController::class,'exportIntoExcel']);
Route::get("export-csv",[EmployeeController::class,'exportIntoCSV']);
Route::get('product/pdf',[filecontroller::class,'createPDF']);
Route::post('register', [AuthController::class,'register']);
Route::post('login', [AuthController::class,'login']);
Route::middleware('auth:api')->group(function() {

    Route::get('user/{userId}/detail', [UsersController::class,'show']);
});
Route::get("import-form",[EmployeeController::class,'inputForm']);
Route::post("/import",[EmployeeController::class,'import'])->name('employee-import');