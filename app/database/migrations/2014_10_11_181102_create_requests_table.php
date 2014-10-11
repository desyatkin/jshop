<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        DB::statement("
		    CREATE TABLE requests(
		      id bigserial NOT NULL,
		      user_id bigint NOT NULL REFERENCES users (id),
		      item_id bigint NOT NULL REFERENCES items (id),
		      money DECIMAL (10, 2) DEFAULT 0,
		      description text NOT NULL,
		      status_id bigint NOT NULL DEFAULT 1 REFERENCES request_statuses (id),
		      created_at TIMESTAMP without time zone NOT NULL DEFAULT NOW(),
		      updated_at TIMESTAMP without time zone NOT NULL DEFAULT NOW(),
              CONSTRAINT requests_pkey PRIMARY KEY (id)
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
		    DROP TABLE requests CASCADE ;
		");
	}

}
