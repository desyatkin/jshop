<?php


class ItemStatusesTableSeeder extends Seeder
{
    public function run() {
        ItemStatuses::create([
            'id'   => 1,
            'name' => 'Создан'
        ]);

        ItemStatuses::create([
            'id'   => 2,
            'name' => 'Активен'
        ]);

        ItemStatuses::create([
            'id'   => 3,
            'name' => 'Сформирован'
        ]);

        ItemStatuses::create([
            'id'   => 4,
            'name' => 'Едет'
        ]);

        ItemStatuses::create([
            'id'   => 5,
            'name' => 'Получен организатором'
        ]);

        ItemStatuses::create([
            'id'   => 6,
            'name' => 'Окончен'
        ]);

        ItemStatuses::create([
            'id'   => 7,
            'name' => 'Отменен'
        ]);
    }

}