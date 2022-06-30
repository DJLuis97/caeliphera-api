<?php
namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PersonResource extends JsonResource {
	/**
	 * Transform the resource into an array.
	 *
	 * @param Request $request
	 *
	 * @return array
	 */
	public function toArray ($request): array {
		return [
			'birth'     => $this->birth,
			'ci'        => $this->ci,
			'full_name' => $this->full_name,
			'id'        => $this->id
		];
	}
}
