<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Person extends Model {
	use HasFactory;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array<int, string>
	 */
	protected $fillable = ['birth', 'ci', 'first_name', 'last_name'];

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

	/**
	 * Accessors._ Get the people's full_name attribute.
	 *
	 * @return Attribute
	 */
	protected function fullName (): Attribute {
		return Attribute::get(function () {
			return "{$this->first_name} {$this->last_name}";
		});
	}
}