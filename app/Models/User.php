<?php
namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable {
	use HasApiTokens, HasFactory, Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array<int, string>
	 */
	protected $fillable = [
		'name',
		'email',
		'password',
	];
	/**
	 * The attributes that should be hidden for serialization.
	 *
	 * @var array<int, string>
	 */
	protected $hidden = [
		'password',
		'remember_token',
	];
	/**
	 * The attributes that should be cast.
	 *
	 * @var array<string, string>
	 */
	protected $casts = [
		'email_verified_at' => 'datetime',
		'leader_type'       => 'boolean'
	];

	/**
	 * Relación._ Get the person that owns the user.
	 *
	 * @return BelongsTo
	 */
	public function person (): BelongsTo {
		return $this->belongsTo(Person::class);
	}

	/**
	 * Relación._ Get the recopiladores for the leader (user).
	 *
	 * @return HasMany
	 */
	public function recopiladoresAsLeader (): HasMany {
		return $this->hasMany(Recopilador::class, 'leader_id');
	}

	/**
	 * Scope a query to only include leader users.
	 *
	 * @param Builder $query
	 *
	 * @return Builder
	 */
	public function scopeLeader (Builder $query): Builder {
		return $query->where('leader_type', true);
	}
}