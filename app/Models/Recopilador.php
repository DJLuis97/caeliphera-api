<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Recopilador extends Model {
	use HasFactory;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array<int, string>
	 */
	protected $fillable = ['id_encargado', 'leader_id', 'parroquia_id'];
	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'recopiladores';

	/**
	 * Relación._ Get the person that owns the recopilador.
	 *
	 * @return BelongsTo
	 */
	public function person (): BelongsTo {
		return $this->belongsTo(Person::class);
	}

	/**
	 * Relación._ Get the leader (user) that owns the recopilador.
	 *
	 * @return BelongsTo
	 */
	public function leader (): BelongsTo {
		return $this->belongsTo(User::class, 'leader_id');
	}

	/**
	 * Relación._ Get the encargado (person) that owns the recopilador.
	 *
	 * @return BelongsTo
	 */
	public function encargado (): BelongsTo {
		return $this->belongsTo(Person::class, 'id_encargado');
	}

	/**
	 * Relación._ Get the parroquia that owns the recopilador.
	 *
	 * @return BelongsTo
	 */
	public function parroquia (): BelongsTo {
		return $this->belongsTo(Parroquia::class);
	}
}