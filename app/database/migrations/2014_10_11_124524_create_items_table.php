<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::statement("
		    CREATE TABLE items(
		      id bigserial NOT NULL,
		      user_id bigint NOT NULL REFERENCES users (id),
		      city_id bigint NOT NULL REFERENCES city (id),
		      tracker VARCHAR (255),
		      name VARCHAR (255) NOT NULL,
		      money DECIMAL (10, 2) DEFAULT 0,
		      description text NOT NULL,
		      status_id bigint NOT NULL DEFAULT 1 REFERENCES item_statuses (id),
		      relevance_date TIMESTAMP without time zone NOT NULL DEFAULT NOW(),
		      end_date TIMESTAMP without time zone NOT NULL DEFAULT NOW(),
		      created_at TIMESTAMP without time zone NOT NULL DEFAULT NOW(),
		      updated_at TIMESTAMP without time zone NOT NULL DEFAULT NOW(),
              CONSTRAINT items_pkey PRIMARY KEY (id)
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
		    DROP TABLE items CASCADE ;
		");
	}

}
