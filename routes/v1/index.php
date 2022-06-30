<?php

use App\Http\Controllers\Person\RecopiladorController;
use App\Http\Controllers\Person\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
	Route::middleware('auth:sanctum')->group(function () {
		// User
		Route::get('users/leader', [UserController::class, 'leader']);
		// Recopilador
		Route::post('recopiladores', [RecopiladorController::class, 'store']);
	});
});