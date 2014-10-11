<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCityTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        DB::statement("
            CREATE TABLE IF NOT EXISTS city (
                id serial NOT NULL,
                name varchar(255) NOT NULL,
                CONSTRAINT city_pkey PRIMARY KEY (id)
            );
        ");
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        DB::table('city')->delete();
	}

}
