<?php
namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest {
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules (): array {
		return [
			'device_name' => 'required',
			'email'       => 'required|email',
			'password'    => 'required'
		];
	}
}