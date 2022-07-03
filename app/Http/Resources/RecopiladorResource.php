<?php
namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RecopiladorResource extends JsonResource {
	/**
	 * The "data" wrapper that should be applied.
	 *
	 * @var string|null
	 */
	public static $wrap = 'recopilador';

	/**
	 * Transform the resource into an array.
	 *
	 * @param Request $request
	 *
	 * @return array
	 */
	public function toArray ($request): array {
		return [
			'address'   => $this->address,
			'encargado' => new PersonResource($this->whenLoaded('encargado')),
			'id'        => $this->id,
			'latitude'  => $this->latitude,
			'leader'    => new UserResource($this->whenLoaded('leader')),
			'longitude' => $this->longitude,
			'parroquia' => new ParroquiaResource($this->whenLoaded('parroquia')),
			'person'    => new PersonResource($this->whenLoaded('person'))
		];
	}
}
