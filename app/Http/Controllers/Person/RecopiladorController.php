<?php
namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\Http\Requests\Person\Recopilador\StoreRequest;
use App\Http\Resources\RecopiladorResource;
use App\Models\Parroquia;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class RecopiladorController extends Controller {
	/**
	 * @throws ValidationException
	 */
	public function store (StoreRequest $request): RecopiladorResource {
		$validated_person = $request->safe()->only('birth', 'first_name', 'last_name');
		$validated_person_ci = $request->safe()->only('ci');
		$encargado = Person::query()->with([
			'user' => function ($query) {
				$query->where('leader_type', true);
			}
		])->findOrFail($request->id_encargado);
		$parroquia = Parroquia::query()->findOrFail($request->parroquia_id);
		$recopilador_person = Person::query()->firstOrCreate($validated_person_ci, $validated_person);
		if ($recopilador_person->has('recopilador')->exists()) {
			throw ValidationException::withMessages([
				'ci' => 'Ya eres recopilador'
			]);
		}
		$recopilador = $recopilador_person->recopilador()->create([
			'id_encargado' => $encargado->id,
			'leader_id'    => $request->user()->id,
			'parroquia_id' => $parroquia->id,
		]);

		return new RecopiladorResource($recopilador);
	}
}
