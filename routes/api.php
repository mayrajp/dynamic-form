<?php

use App\Http\Controllers\Api\DynamicFormController;
use App\Http\Controllers\Api\FieldController;
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

Route::post('/field/create', [FieldController::class, 'create']);
Route::get('/field/all/by/form/{id}', [FieldController::class, 'getAllByForm']);
Route::get('/field/show/{id}', [FieldController::class, 'show']);
Route::put('/field/update/{id}', [FieldController::class, 'update']);
Route::delete('/field/deactivate/{id}', [FieldController::class, 'deactivate']);







