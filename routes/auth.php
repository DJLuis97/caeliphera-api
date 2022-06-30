<?php

use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
	Route::post('login', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'store']);
});
