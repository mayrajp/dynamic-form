<?php

use App\Http\Controllers\Api\CompletedFormController;
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

Route::controller(DynamicFormController::class)->group(function () {
    Route::get('/dynamic_forms/all', 'index');
    Route::post('/dynamic_forms/create', 'create');
    Route::get('/dynamic_forms/show/{id}', 'show');
    Route::put('/dynamic_forms/update/{id}', 'update');
    Route::delete('/dynamic_forms/delete/{id}', 'destroy');
});

Route::controller(FieldController::class)->group(function () {
    Route::post('/field/create', 'create');
    Route::get('/field/all/by/form/{id}', 'getAllByForm');
    Route::get('/field/show/{id}', 'show');
    Route::put('/field/update/{id}', 'update');
    Route::delete('/field/deactivate/{id}', 'deactivate');
});

Route::controller(CompletedFormController::class)->group(function () {
    Route::get('/completed_forms/all', 'index');
    Route::get('/completed_forms/show/{id}', 'show');
    Route::post('/completed_forms/create', 'create');
    Route::post('/completed_forms/update/{id}', 'update');

    // Route::put('/completed_forms/update/{id}', 'update');
    // Route::delete('/completed_forms/delete/{id}', 'destroy');
});
