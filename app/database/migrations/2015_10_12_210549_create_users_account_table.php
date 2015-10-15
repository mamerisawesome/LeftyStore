<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersAccountTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->string('bank_acct_no', 20)->primary();
			$table->string('username', 60)->unique();
            $table->string('password', 60);
			$table->string('first_name', 30);
			$table->string('middle_name', 30);
			$table->string('last_name', 30);
			$table->string('address', 60);
			$table->string('approved_by', 60);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
