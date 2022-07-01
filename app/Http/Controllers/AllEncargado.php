<?php
namespace App\Http\Controllers;

use App\Http\Resources\PersonCollection;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class AllEncargado extends Controller {
	/**
	 * Handle the incoming request.
	 *
	 * @param Request $request
	 *
	 * @return PersonCollection
	 */
	public function __invoke (Request $request): PersonCollection {
		$user_leader = Person::query()->with([
			'user' => function ($query) {
				$query->where('leader_type', true);
			}
		])->get();
		$recopiladores = Person::query()->has('recopilador')->get();

		return new PersonCollection(Arr::collapse([$user_leader, $recopiladores]));
	}
}