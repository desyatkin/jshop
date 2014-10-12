<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParamsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::statement("
		    CREATE TABLE params(
              id bigserial NOT NULL,
              name VARCHAR (255) NOT NULL,
              index VARCHAR (255) NOT NULL,
              unit VARCHAR (100) NOT NULL,
              description text,
              CONSTRAINT params_pkey PRIMARY KEY (id)
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
		    DROP TABLE if EXISTS params CASCADE;
		");
	}

}
