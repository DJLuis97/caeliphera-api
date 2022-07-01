<?php
namespace Database\Seeders;

use App\Models\Parroquia;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParroquiaSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run () {
		$parroquias = [
			['name' => 'Aníbal San Andrés'],
			['name' => 'Colorado'],
			['name' => 'General Alfaro'],
			['name' => 'Leónidas Proaño'],
			['name' => 'Montecristi'],
			['name' => 'La Pila']
		];
		foreach ($parroquias as $parroquia) {
			Parroquia::query()->create($parroquia);
		}
	}
}