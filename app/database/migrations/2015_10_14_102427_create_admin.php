<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdmin extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('administrators', function(Blueprint $table)
		{
			$table->increments('admin_id', 20);
			
			$table->string('admin_username')->unsigned();
			$table->foreign('admin_username')
				  ->references('username')->on('users')
				  ->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('administrators');
	}

}
