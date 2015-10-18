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
                'bank_acct_no'		=> '1234567890',
				'username'			=> 'almer',
                'password'			=> Hash::make('123'),
                'first_name'		=> 'Almer',
                'middle_name'		=> 'Taculog',
                'last_name'			=> 'Mendoza',
                'address'			=> '6 CM Borja Street Barangay Sta. Ana, Pateros Metro Manila',
				'approved_by'		=> 'almer'
            ]
        );

    }

}