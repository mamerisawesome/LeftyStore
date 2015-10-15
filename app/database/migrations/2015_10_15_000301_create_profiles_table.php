<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('profiles', function(Blueprint $table)
		{
			$table->increments('profile_id', 20);
			
			$table->string('profile_username')->unsigned();
			$table->foreign('profile_username')
				  ->references('username')->on('users')
				  ->onDelete('cascade');
			
			$table->integer('profile_interests_id')->unsigned()->unique();
			$table->foreign('profile_interests_id')
				  ->references('profile_interests_id')->on('profile_interests')
				  ->onDelete('cascade');
			
			$table->integer('profile_other_accts_id')->unsigned()->unique();
			$table->foreign('profile_other_accts_id')
				  ->references('profile_other_accts_id')->on('profile_other_accts')
				  ->onDelete('cascade');
			
			$table->date('birthday');
			$table->integer('age');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('profiles');
	}

}
