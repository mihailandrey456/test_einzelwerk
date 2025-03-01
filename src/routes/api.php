<?php

use App\Http\Controllers\CounterpartyController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('/auth')->group(function() {
    Route::post('/token', [AuthController::class, 'token']);
    Route::post('/register', [AuthController::class, 'register']);
});

Route::prefix('/counterparties')->middleware('auth:sanctum')->group(function() {
    Route::get('/', [CounterpartyController::class, 'index']);
    Route::post('/', [CounterpartyController::class, 'store']);
});