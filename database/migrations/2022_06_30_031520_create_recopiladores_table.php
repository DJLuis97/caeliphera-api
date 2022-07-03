<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecopiladoresTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up () {
		Schema::create('recopiladores', function (Blueprint $table) {
			$table->id();
			$table->string('address');
			$table->timestamp('address_at')->comment('Marca de tiempo cuando se tomó la ubicación');
			$table->string('latitude');
			$table->string('longitude');
			$table->string('ci_path')->comment('Ruta donde se encuentra la imagen de la cédula');
			// Columna única ya que la relación es de uno-uno, si es uno-muchos quitar relación
			$table->foreignIdFor(\App\Models\Person::class)->unique();
			$table->foreignId('leader_id')->constrained('users');
			$table->foreignId('id_encargado')->constrained('people');
			$table->foreignIdFor(\App\Models\Parroquia::class);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down () {
		Schema::dropIfExists('recopiladores');
	}
}
