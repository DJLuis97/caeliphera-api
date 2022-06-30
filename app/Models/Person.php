<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Person extends Model {
	use HasFactory;

	/**
	 * Relación._ Get the user associated with the person.
	 *
	 * @return HasOne
	 */
	public function user (): HasOne {
		return $this->hasOne(User::class);
	}

	/**
	 * Relación._ Get the recopilador associated with the person.
	 *
	 * @return HasOne
	 */
	public function recopilador (): HasOne {
		return $this->hasOne(Recopilador::class);
	}

	/**
	 * Relación._ Get the recopilador associated with the encargado (person).
	 *
	 * @return HasOne
	 */
	public function recopiladorAsEncargado (): HasOne {
		return $this->hasOne(Recopilador::class, 'id_encargado');
	}
}