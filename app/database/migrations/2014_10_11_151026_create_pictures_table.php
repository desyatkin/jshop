<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePicturesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::statement("
		    CREATE TABLE pictures(
		      id bigserial NOT NULL,
		      name VARCHAR (255),
		      path VARCHAR (255) NOT NULL,
		      description text,
		      created_at TIMESTAMP without time zone NOT NULL DEFAULT NOW(),
		      updated_at TIMESTAMP without time zone NOT NULL DEFAULT NOW(),
		      CONSTRAINT pictures_pkey PRIMARY KEY (id)
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
		    DROP TABLE pictures;
		");
	}

}
