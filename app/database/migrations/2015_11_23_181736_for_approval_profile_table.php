<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForApprovalProfileTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('for_approval_profile', function(Blueprint $table)
		{
			$table->increments('profile_id', 20);
			
			$table->string('profile_username')->unsigned();
			$table->foreign('profile_username')
				  ->references('username')->on('for_approval')
				  ->onDelete('cascade');
			
			$table->date('birthday');
			$table->integer('age');
		});
		
		Schema::create('for_approval_profile_interest', function(Blueprint $table)
		{
			$table->increments('profile_interests_id', 20);
			
			$table->integer('profile_id')->unsigned();			
			$table->foreign('profile_id')
				  ->references('profile_id')->on('for_approval_profile')
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
		Schema::drop('for_approval_profile_interest');
		Schema::drop('for_approval_profile');
	}

}
