<?php

use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

        User::create([
            'email' => 'k.desyatkin@404-group.com',
            'money' => 300000,
            'password' => Hash::make('kleopatra')
        ]);

		foreach(range(2, 100) as $index)
		{
			User::create([
                'email' => $faker->unique()->email,
                'password' => Hash::make('password')
			]);
		}
	}

}