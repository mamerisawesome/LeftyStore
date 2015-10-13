<?php

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        $this->call('UserTableSeeder');

        $this->command->info('User table seeded!');
    }

}

class UserTableSeeder extends Seeder{

    public function run()
    {
        DB::table('users')->delete();

        User::create(
            [
                'username'	=>'almer',
                'password'	=>Hash::make('123')
            ]
        );
		
		User::create(
            [
                'username'	=>'sergio',
                'password'	=>Hash::make('123')
            ]
        );
		
		User::create(
            [
                'username'	=>'janabels',
                'password'	=>Hash::make('123')
            ]
        );
		

    }

}