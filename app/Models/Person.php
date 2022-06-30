<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
	 * Relación._ Get the recopiladores for the encargado (person).
	 *
	 * @return HasMany
	 */
	public function recopiladorAsEncargado (): HasMany {
		return $this->hasMany(Recopilador::class, 'id_encargado');
	}
}