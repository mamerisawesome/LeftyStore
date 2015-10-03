<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAccountsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('accounts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('type', 10);
            $table->string('firstName', 50);
            $table->string('middleName', 50);
            $table->string('lastName', 50);
            $table->date('birthdate');
            $table->string('sex', 10);
            $table->string('email', 60)->unique();
            $table->string('username', 60)->unique();
            $table->string('password', 60);
            $table->string('studentNumber', 10)->nullable()->unique();
            $table->string('employeeNumber')->nullable()->unique();
            $table->string('room', 5)->nullable();
            $table->string('academicPosition', 30)->nullable();
            $table->string('consultation', 100)->nullable();
            $table->string('guide', 1000)->nullable();
            $table->string('bio', 1000)->nullable();
            // will accept a url to a filename with a file type JSON
            $table->string('groups',255);
            $table->string('messages',255);
            //for the profile picture
            $table->string('avatar', 50)->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        File::cleanDirectory('public/JSONcontents/accounts/groups');
        File::cleanDirectory('public/JSONcontents/accounts/messages');
        Schema::drop('accounts');
	}

}
