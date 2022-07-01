<?php
namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ParroquiaResource extends JsonResource {
	/**
	 * The "data" wrapper that should be applied.
	 *
	 * @var string|null
	 */
	public static $wrap = 'parroquia';

	/**
	 * Transform the resource into an array.
	 *
	 * @param Request $request
	 *
	 * @return array
	 */
	public function toArray ($request): array {
		return [
			'id'   => $this->id,
			'name' => $this->name
		];
	}
}
