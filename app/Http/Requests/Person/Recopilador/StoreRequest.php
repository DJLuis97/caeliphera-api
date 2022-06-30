<?php
namespace App\Http\Requests\Person\Recopilador;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest {
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize (): bool {
		return true;
	}

	/**
	 * Handle a failed authorization attempt.
	 *
	 * @return void
	 *
	 * @throws AuthorizationException
	 */
	protected function failedAuthorization () {
		throw new AuthorizationException('No autorizado para guardar recopiladores.');
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules (): array {
		return [
			// Atributos para person
			'birth'        => 'required|date|before_or_equal:now',
			'ci'           => 'required|string|min:10|max:10',
			'first_name'   => 'required|string|max:255',
			'last_name'    => 'required|string|max:255',
			// Atributos para recopilador
			'id_encargado' => 'required|exists:App\Models\Person,id',
			'parroquia_id' => 'required|exists:App\Models\Parroquia,id',
		];
	}
}
