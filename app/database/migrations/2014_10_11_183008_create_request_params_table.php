<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestParamsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        DB::statement("
		    CREATE TABLE request_params(
		      request_id bigint NOT NULL REFERENCES requests (id),
		      param_id bigint NOT NULL REFERENCES params (id),
		      value VARCHAR(255) DEFAULT '',
              CONSTRAINT request_params_pkey PRIMARY KEY (request_id, param_id)
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
		    DROP TABLE request_params CASCADE ;
		");
	}

}
