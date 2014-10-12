<?php

use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

        User::create([
            'id' => 1,
            'email' => 'k.desyatkin@404-group.com',
            'password' => Hash::make('kleopatra')
        ]);

		foreach(range(2, 100) as $index)
		{
			User::create([
                'id' => $index,
                'email' => $faker->unique()->email,
                'password' => Hash::make('password')
			]);
		}
	}

}