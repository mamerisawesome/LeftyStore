<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForApprovalTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('for_approval', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('bank_acct_no', 20)->unique();
			$table->string('username', 60)->unique();
			$table->string('password', 200);
			$table->string('first_name', 30);
			$table->string('middle_name', 30);
			$table->string('last_name', 30);
			$table->string('address', 60);
			$table->string('approved_by', 60)->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('for_approval');
	}

}
