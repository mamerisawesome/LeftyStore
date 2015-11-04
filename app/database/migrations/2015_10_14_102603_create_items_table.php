<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('items', function(Blueprint $table)
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
			
			$table->integer('approved_by')->unsigned();						
			$table->foreign('approved_by')
				  ->references('admin_id')->on('administrators')
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
		Schema::drop('items');
	}

}
