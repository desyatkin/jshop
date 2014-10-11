<?php


class ParamTableSeeder extends Seeder {

	public function run()
	{
        Params::create([
            'id' => 1,
            'name' => 'Стоимость',
            'index' => ''
        ]);

        Params::create([
            'id' => 2,
            'name' => 'Вес',
            'index' => ''
        ]);


        Params::create([
            'id' => 4,
            'name' => 'Количество',
            'index' => ''
        ]);

	}

}