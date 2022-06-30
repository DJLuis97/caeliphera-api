<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
	Route::post('login', [AuthenticatedSessionController::class, 'store']);
	Route::middleware('auth:sanctum')->group(function () {
		Route::get('logout', [AuthenticatedSessionController::class, 'destroy']);
	});
});
