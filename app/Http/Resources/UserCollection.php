<?php
namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection {
	/**
	 * The "data" wrapper that should be applied.
	 *
	 * @var string|null
	 */
	public static $wrap = 'users';

	/**
	 * Transform the resource collection into an array.
	 *
	 * @param Request $request
	 *
	 * @return AnonymousResourceCollection
	 */
	public function toArray ($request): AnonymousResourceCollection {
		return UserResource::collection($this->collection);
	}
}
