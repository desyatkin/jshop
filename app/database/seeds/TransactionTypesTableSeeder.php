<?php
class TransactionTypesTableSeeder extends Seeder {

	public function run()
	{
	    TransactionType::create([
            'id' => 1,
            'name' => 'Пополнение счёта'
        ]);
	    TransactionType::create([
            'id' => 2,
            'name' => 'Участие в покупке'
        ]);
	    TransactionType::create([
            'id' => 3,
            'name' => 'Перевод денег организатору'
        ]);
	    TransactionType::create([
            'id' => 4,
            'name' => 'Перевод денег другому участнику'
        ]);
	    TransactionType::create([
            'id' => 5,
            'name' => 'Вывод средств'
        ]);
	    TransactionType::create([
            'id' => 6,
            'name' => 'Возрат средств'
        ]);
	}
}