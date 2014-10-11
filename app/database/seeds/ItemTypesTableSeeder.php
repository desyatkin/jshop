<?php

class ItemTypesTableSeeder extends Seeder {

	public function run()
	{
	    ItemTypes::create([
            'id' => 1,
            'name' => 'Количественная'
        ]);

        ItemTypes::create([
            'id' => 2,
            'name' => 'Составная'
        ]);
	}

}