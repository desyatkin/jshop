<?php

use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 100) as $index)
		{
			User::create([
                'email' => $faker->unique()->email,
                'password' => Hash::make('password')
			]);
		}
	}

}