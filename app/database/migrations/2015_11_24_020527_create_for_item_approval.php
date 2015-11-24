<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForItemApproval extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('for_item_approval', function(Blueprint $table)
		{
			$table->increments('item_no');
			$table->string('item_name', 60);
			$table->float('price');
			$table->string('category', 60);
			$table->string('avatar', 200);
			
			$table->string('posted_by')->unsigned();			
			$table->foreign('posted_by')
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
		Schema::drop('for_item_approval');
	}

}
