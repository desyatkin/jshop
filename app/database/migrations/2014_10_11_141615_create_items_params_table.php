<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsParamsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::statement("
		    CREATE TABLE items_params(
		      id bigserial NOT NULL,
		      item_id bigint NOT NULL REFERENCES items (id),
		      param_id bigint NOT NULL REFERENCES params (id),
		      compare_id bigint NOT NULL REFERENCES item_compares (id),
		      is_requier boolean NOT NULL DEFAULT FALSE,
              value VARCHAR (255) NOT NULL,
		      CONSTRAINT items_params_pkey PRIMARY KEY (id)
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
		    DROP TABLE items_params;
		");
	}

}
