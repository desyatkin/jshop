<?php

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        $this->call('TransactionTypesTableSeeder');
		$this->call('CityTableSeeder');
		$this->call('UsersTableSeeder');
		$this->call('ItemCompareTableSeeder');
		$this->call('ItemStatusesTableSeeder');
		$this->call('RequestStatusesTableSeeder');
		$this->call('ParamTableSeeder');
		$this->call('ItemTypesTableSeeder');
		$this->call('ItemsTableSeeder');
	}

}
