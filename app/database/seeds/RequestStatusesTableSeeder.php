<?php


class RequestStatusesTableSeeder extends Seeder
{
    public function run() {
        RequestStatuses::create([
            'id'   => 1,
            'name' => 'Создана'
        ]);

        RequestStatuses::create([
            'id'   => 2,
            'name' => 'Откланена'
        ]);
    }

}