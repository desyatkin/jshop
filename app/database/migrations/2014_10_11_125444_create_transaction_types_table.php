<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionTypesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        DB::statement("
            CREATE TABLE IF NOT EXISTS transaction_types (
                id serial NOT NULL,
                name varchar(255) NOT NULL,
                CONSTRAINT transaction_types_pkey PRIMARY KEY (id)
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
		    DROP TABLE transaction_types CASCADE ;
		");
	}

}
