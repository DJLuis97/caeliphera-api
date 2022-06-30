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
			// Columna única ya que la relación es de uno-uno, si es uno-muchos quitar relación
			$table->foreignIdFor(\App\Models\Person::class)->unique();
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
