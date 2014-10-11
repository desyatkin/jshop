<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ItemCompareTableSeeder extends Seeder {

	public function run()
	{
        ItemCompares::create([
            'id' => 1,
            'name' => 'Больше',
            'index' => '>'
        ]);

        ItemCompares::create([
            'id' => 2,
            'name' => 'Меньше',
            'index' => '<'
        ]);

        ItemCompares::create([
            'id' => 3,
            'name' => 'Равно',
            'index' => '='
        ]);
	}

}