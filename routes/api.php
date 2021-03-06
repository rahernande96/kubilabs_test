<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('/v1')->group(function () {
    Route::post('/login', [App\Http\Controllers\Api\V1\Auth\LoginController::class, 'login']);
    
    Route::middleware('auth:sanctum')->group(function () {

        // Calculate Salary

        Route::get('/salary', [App\Http\Controllers\Api\V1\Salary\SalaryController::class, 'index']);

    });
});