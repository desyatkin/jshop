<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemStatusesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::statement("
		    CREATE TABLE item_statuses(
		      id bigserial NOT NULL,
		      name VARCHAR (255) NOT NULL,
		      CONSTRAINT item_statuses_pkey PRIMARY KEY (id)
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
		    DROP TABLE item_statuses CASCADE ;
		");
	}

}
