<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileInterests extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('profile_interests', function(Blueprint $table)
		{
			$table->increments('profile_interests_id', 20);
			
			$table->string('profile_interests_username')->unique()->unsigned();			
			$table->foreign('profile_interests_username')
				  ->references('username')->on('users')
				  ->onDelete('cascade');
			
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
		Schema::drop('profile_interests');
	}

}
