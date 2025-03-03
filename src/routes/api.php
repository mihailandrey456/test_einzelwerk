<?php

use App\Http\Controllers\Api\CounterpartyController;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/openapi', function () {
    return Storage::disk('openapi')->get('openapi.json');
});

Route::prefix('/auth')->group(function() {
    Route::post('/token', [AuthController::class, 'token']);
    Route::post('/register', [AuthController::class, 'register']);
});

Route::prefix('/counterparties')->middleware('auth:sanctum')->group(function() {
    Route::get('/', [CounterpartyController::class, 'index']);
    Route::post('/', [CounterpartyController::class, 'store']);
});