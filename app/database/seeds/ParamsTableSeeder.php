<?php


class ParamTableSeeder extends Seeder {

	public function run()
	{
        Params::create([
            'id' => 1,
            'name' => 'Стоимость',
            'unit' => 'руб.'
        ]);

        Params::create([
            'id' => 2,
            'name' => 'Вес',
            'unit' => 'кг'
        ]);


        Params::create([
            'id' => 4,
            'name' => 'Количество',
            'unit' => 'шт.'
        ]);

	}

}