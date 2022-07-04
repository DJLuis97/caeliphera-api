<?php
namespace Database\Seeders;

use App\Models\Person;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run () {
		Person::query()->create([
			'first_name' => 'Luis',
			'last_name'  => 'Suárez',
			'ci'         => '0000000000',
			'birth'      => '2016-06-30'
		])->user()->create([
			'email'             => 'luis@test.dev',
			'email_verified_at' => now(),
			'password'          => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
			'leader_type'       => true
		]);
		Person::query()->create([
			'first_name' => 'Daniel',
			'last_name'  => 'Vera',
			'ci'         => '0000000001',
			'birth'      => '2016-06-30'
		])->user()->create([
			'email'             => 'daniel@test.dev',
			'email_verified_at' => now(),
			'password'          => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
			'leader_type'       => true
		]);
		Person::query()->create([
			'first_name' => 'Luis',
			'last_name'  => '-',
			'ci'         => '0000000002',
			'birth'      => '2016-06-30'
		])->user()->create([
			'email'             => 'luis_luis@test.dev',
			'email_verified_at' => now(),
			'password'          => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
			'leader_type'       => false
		]);
	}
}
