<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up () {
		Schema::create('people', function (Blueprint $table) {
			$table->id();
			$table->string('first_name');
			$table->string('last_name');
			$table->string('ci', 10)->unique();
			$table->date('birth');
			$table->timestamps();
		});
		Schema::table('users', function (Blueprint $table) {
			// Columna única ya que la relación es de uno-uno, si es uno-muchos quitar relación
			$table->foreignIdFor(\App\Models\Person::class)->unique();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down () {
		Schema::dropIfExists('people');
		Schema::dropColumns('users', ['person_id']);
	}
}
