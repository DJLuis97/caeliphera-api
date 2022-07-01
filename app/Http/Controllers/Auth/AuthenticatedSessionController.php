<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\StoreRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller {
	/**
	 * @param StoreRequest $request
	 *
	 * @return UserResource
	 * @throws ValidationException
	 */
	public function store (StoreRequest $request): UserResource {
		$validated = $request->validated();
		$user = User::query()->with('person')->where('email', $validated['email'])->first();
		if ( ! $user or ! Hash::check($validated['password'], $user->password)) {
			throw ValidationException::withMessages([
				'email' => 'Las credenciales proporcionadas son incorrectas.'
			]);
		}

		return (new UserResource($user))->additional([
			'access_token' => $user->createToken($validated['device_name'])->plainTextToken,
			'token_type'   => 'Bearer'
		]);
	}

	/**
	 * @return JsonResponse
	 */
	public function destroy (): JsonResponse {
		auth()->user()->tokens()->delete();

		return response()->json('Has cerrado sesión satisfactoriamente.');
	}
}