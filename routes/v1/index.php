<?php

use App\Http\Controllers\ParroquiaController;
use App\Http\Controllers\Person\RecopiladorController;
use App\Http\Controllers\Person\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
	Route::middleware('auth:sanctum')->group(function () {
		// Parroquia
		Route::get('parroquias', [ParroquiaController::class, 'index']);
		// User
		Route::get('users/leader', [UserController::class, 'leader']);
		// Recopilador
		Route::get('recopiladores', [RecopiladorController::class, 'index']);
		Route::post('recopiladores', [RecopiladorController::class, 'store']);
		// Todos los encargados
		Route::get('encargados', \App\Http\Controllers\AllEncargado::class);
	});
});