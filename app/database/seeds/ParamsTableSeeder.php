<?php


class ParamTableSeeder extends Seeder
{

    public function run() {
        Params::create([
            'id'    => 1,
            'name'  => 'Стоимость',
            'index' => 'cost',
            'unit'  => 'руб.'
        ]);

        Params::create([
            'id'    => 2,
            'name'  => 'Вес',
            'index' => 'weigth',
            'unit'  => 'кг'
        ]);


        Params::create([
            'id'    => 4,
            'name'  => 'Количество',
            'index' => 'number',
            'unit'  => 'шт.'
        ]);

    }

}