<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileOtherAccts extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('profile_other_accts', function(Blueprint $table)
		{
			$table->increments('profile_other_accts_id', 20);
			
			$table->string('profile_other_accts_username')->unique()->unsigned();			
			$table->foreign('profile_other_accts_username')
				  ->references('username')->on('users')
				  ->onDelete('cascade');
			
			$table->string('account', 60);
			$table->string('interest', 60);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('profile_other_accts');
	}

}
