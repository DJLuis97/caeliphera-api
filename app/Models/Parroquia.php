<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Parroquia extends Model {
	use HasFactory;

	/**
	 * Relación._ Get the recopiladores for the parroquia.
	 *
	 * @return HasMany
	 */
	public function recopiladores (): HasMany {
		return $this->hasMany(Recopilador::class);
	}
}
