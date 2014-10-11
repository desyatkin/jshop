<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        DB::statement("
            CREATE TABLE IF NOT EXISTS transactions (
                id bigserial NOT NULL,
                user_id bigint DEFAULT 0,
                to_user_id bigint DEFAULT 0,
                item_id bigint DEFAULT 0,
                type_id int NOT NULL REFERENCES transaction_types(id),
                value decimal(10,2) NOT NULL,
                created_at timestamp without time zone NOT NULL DEFAULT NOW(),
                CONSTRAINT transactions_pkey PRIMARY KEY (id)
            );
        ");

        DB::statement("CREATE INDEX transactions_user_id_idx ON transactions(user_id)");
        DB::statement("CREATE INDEX transactions_to_user_id_idx ON transactions(to_user_id)");
        DB::statement("CREATE INDEX transactions_itesm_id_idx ON transactions(item_id)");
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        DB::statement("
		    DROP TABLE transactions CASCADE ;
		");
	}

}
