<?php

use App\Http\Controllers\CounterpartyController;
use Illuminate\Support\Facades\Route;

Route::prefix('/counterparties')->group(function() {
    Route::get('/', [CounterpartyController::class, 'index']);
    Route::post('/', [CounterpartyController::class, 'store']);
});