<?php
namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource {
	/**
	 * The "data" wrapper that should be applied.
	 *
	 * @var string|null
	 */
	public static $wrap = 'user';

	/**
	 * Transform the resource into an array.
	 *
	 * @param Request $request
	 *
	 * @return array
	 */
	public function toArray ($request): array {
		return [
			'email'       => $this->email,
			'id'          => $this->id,
			'leader_type' => $this->leader_type,
			'person'      => new PersonResource($this->whenLoaded('person'))
		];
	}
}
