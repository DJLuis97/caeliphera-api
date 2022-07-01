<?php
namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ParroquiaCollection extends ResourceCollection {
	/**
	 * The "data" wrapper that should be applied.
	 *
	 * @var string|null
	 */
	public static $wrap = 'parroquias';

	/**
	 * Transform the resource collection into an array.
	 *
	 * @param Request $request
	 *
	 * @return AnonymousResourceCollection
	 */
	public function toArray ($request): AnonymousResourceCollection {
		return ParroquiaResource::collection($this->collection);
	}
}
