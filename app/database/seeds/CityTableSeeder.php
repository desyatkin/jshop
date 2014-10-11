<?php

class CityTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        City::create([
            'name' => 'Санкт-Петербург'
        ]);
        City::create([
            'name' => 'Москва'
        ]);
        City::create([
            'name' => 'Пермь'
        ]);
	}

}
