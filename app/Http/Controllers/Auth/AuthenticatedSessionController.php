<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller {
	public function store (Request $request) {
		if (Auth::attempt($request->only(['email', 'password']))) {
			$user = User::query()->where('email', $request['email'])->firstOrFail();
			$token = $user->createToken('auth_token')->plainTextToken;

			return (new UserResource($user))->additional([
				'access_token' => $token,
				'token_type'   => 'Bearer'
			]);
		}

		return response()->json('Acceso no autorizado.', 401);
	}

	/**
	 * @return JsonResponse
	 */
	public function destroy (): JsonResponse {
		auth()->user()->tokens()->delete();

		return response()->json('Has cerrado sesión satisfactoriamente');
	}
}