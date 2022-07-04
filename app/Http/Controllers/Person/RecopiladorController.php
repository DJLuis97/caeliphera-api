<?php
namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\Http\Requests\Person\Recopilador\StoreRequest;
use App\Http\Resources\RecopiladorCollection;
use App\Http\Resources\RecopiladorResource;
use App\Models\Parroquia;
use App\Models\Person;
use App\Models\Recopilador;
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
		// ¿Existe una persona que es también recopilador y la cédula tal?
		if (Person::query()->has('recopilador')->where('ci', $validated_person_ci)->exists()) {
			throw ValidationException::withMessages([
				'ci' => 'Cédula ya pertenece a un recopilador'
			]);
		}
		// Debería guardarse en la parte final cuando se vaya a crear el registro, ya que si se lo hace de
		// primero puede que alguna cosa falle y ese archivo se quede guardado igual.
		if ($request->hasFile('ci_photo')) {
			$ci_path = $request->file('ci_photo')->store('cedulas');
		}
		$recopilador = $recopilador_person->recopilador()->create([
			'address'      => $request->address ?? "Montecristi",
			'address_at'   => $request->address_at ?? now(),
			'ci_path'      => $ci_path ?? '',
			'id_encargado' => $encargado->id,
			'latitude'     => $request->latitude,
			'leader_id'    => $request->user()->id,
			'longitude'    => $request->longitude,
			'parroquia_id' => $parroquia->id
		]);

		return new RecopiladorResource($recopilador);
	}

	public function index (): RecopiladorCollection {
		$recopiladores = Recopilador::query()->with(['person', 'leader', 'encargado', 'parroquia'])->get();

		return new RecopiladorCollection($recopiladores);
	}
}
