<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('groups', function(Blueprint $table)
		{
			$table->increments('id');

            $table->string('courseTitle',10);
            $table->string('section',50);
            $table->integer('classSize');
            $table->string('accessCode',10);
            // will accept url to a filename with file type JSON
            $table->string('classList',255);
            $table->string('posts',255);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        File::cleanDirectory('public/JSONcontents/groups/classList');
        File::cleanDirectory('public/JSONcontents/groups/posts');
		Schema::drop('groups');
	}

}
