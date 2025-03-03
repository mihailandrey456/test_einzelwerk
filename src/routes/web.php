<?php

use App\Http\Controllers\CounterpartyController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);

    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);
});

Route::middleware('auth:sanctum')->get('/', [CounterpartyController::class, 'index']);
Route::prefix('/counterparties')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [CounterpartyController::class, 'index'])->name('counterparties.index');
});