<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::statement("
            CREATE TABLE users(
              id bigserial NOT NULL,
              email VARCHAR (255) NOT NULL,
              password VARCHAR (255) NOT NULL,
              remember_token VARCHAR (100),
              money decimal(10,2),
              created_at timestamp without time zone NOT NULL DEFAULT NOW(),
              updated_at timestamp without time zone NOT NULL DEFAULT NOW(),
              CONSTRAINT users_pkey PRIMARY KEY (id)
            );
        ");

        DB::statement("
            CREATE UNIQUE INDEX users_email_uniq ON users (lower(email));
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
		    DROP TABLE users CASCADE ;
		");
	}

}
