<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsPictures extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::statement("
		    CREATE TABLE item_pictures(
		      item_id bigint NOT NULL REFERENCES items(id),
              picture_id bigint NOT NULL REFERENCES pictures(id),
              CONSTRAINT item_pictures_pkey PRIMARY KEY (item_id)
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
		    DROP TABLE item_pictures CASCADE;
		");
	}

}
