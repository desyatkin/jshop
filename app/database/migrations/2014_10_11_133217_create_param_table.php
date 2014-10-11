<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParamTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::statement("
		    CREATE TABLE param(
              id bigserial NOT NULL,
              name VARCHAR (255) NOT NULL,
              index VARCHAR (255) NOT NULL,
              description text,
              value VARCHAR (255) NOT NULL,
              CONSTRAINT param_pkey PRIMARY KEY (id)
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
		    DROP TABLE param CASCADE;
		");
	}

}
