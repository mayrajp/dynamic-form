<?php

use App\Http\Controllers\Api\DynamicFormController;
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

Route::get('/dynamic_forms/all', [DynamicFormController::class, 'getAllForms']);
Route::post('/dynamic_forms/create', [DynamicFormController::class, 'create']);
Route::get('/dynamic_forms/show/{id}', [DynamicFormController::class, 'show']);
Route::put('/dynamic_forms/update/{id}', [DynamicFormController::class, 'update']);
Route::delete('/dynamic_forms/delete/{id}', [DynamicFormController::class, 'destroy']);




