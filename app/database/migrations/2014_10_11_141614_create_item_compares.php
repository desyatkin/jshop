<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemCompares extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::statement("
		    CREATE TABLE item_compares(
		      id bigserial NOT NULL,
		      name VARCHAR (100) NOT NULL,
		      index VARCHAR (100) NOT NULL,
		      CONSTRAINT item_compares_pkey PRIMARY KEY (id)
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
		DB::statement("
		    DROP TABLE item_compares CASCADE ;
		");
	}

}
