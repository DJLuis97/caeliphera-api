<?php
namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PersonResource extends JsonResource {
	/**
	 * The "data" wrapper that should be applied.
	 *
	 * @var string|null
	 */
	public static $wrap = 'person';

	/**
	 * Transform the resource into an array.
	 *
	 * @param Request $request
	 *
	 * @return array
	 */
	public function toArray ($request): array {
		return [
			'birth'       => $this->birth,
			'ci'          => $this->ci,
			'first_name'  => $this->first_name,
			'full_name'   => $this->full_name,
			'id'          => $this->id,
			'last_name'   => $this->last_name,
			'recopilador' => new RecopiladorResource($this->whenLoaded('recopilador')),
			'user'        => new UserResource($this->whenLoaded('user'))
		];
	}
}