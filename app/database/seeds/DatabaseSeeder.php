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

        $this->call('TableSeeder');

        $this->command->info('Tables seeded!');
    }

}

class TableSeeder extends Seeder{

    public function run()
    {
        DB::table('users')->delete();
		DB::table('administrators')->delete();
		DB::table('sellers')->delete();
		
		DB::table('profiles')->delete();
		DB::table('profile_interests')->delete();
		DB::table('profile_other_accts')->delete();
		
		DB::table('items')->delete();

        User::create(
            [
                'bank_acct_no'		=> '1234567890',
				'username'			=> 'almer',
                'password'			=> Hash::make('123'),
                'first_name'		=> 'Almer',
                'middle_name'		=> 'Taculog',
                'last_name'			=> 'Mendoza',
                'address'			=> '6 CM Borja Street Barangay Sta. Ana, Pateros Metro Manila',
				'approved_by'		=> 'almer',
				'approval_date'		=> date('2015-01-01')
            ]
        );
		
		DB::insert("insert into administrators (admin_username) values ('almer')");
		
		DB::insert("insert into profiles (profile_username, birthday, age) values ('almer',NOW(),18)");
		
		DB::insert("insert into profile_other_accts (profile_id, account) "
				   ."values ((select distinct profiles.profile_id from users, profiles "
				   ."where profiles.profile_username = 'almer'), 'yeah')");
		
		DB::insert("insert into profile_interests (profile_id, interest) "
				   ."values ((select distinct profiles.profile_id from users, profiles "
				   ."where profiles.profile_username = 'almer'), 'skateboarding')");
		DB::insert("insert into profile_interests (profile_id, interest) "
				   ."values ((select distinct profiles.profile_id from users, profiles "
				   ."where profiles.profile_username = 'almer'), 'guitar')");
		
		
        User::create(
            [
                'bank_acct_no'		=> '1234567892',
				'username'			=> 'jana',
                'password'			=> Hash::make('123'),
                'first_name'		=> 'Jana',
                'middle_name'		=> 'Dela Vega',
                'last_name'			=> 'Merlan',
                'address'			=> 'My Number, My Barangay, My Rules',
				'approved_by'		=> 'almer',
				'approval_date'		=> date('2015-01-01')
            ]
        );
		
		DB::insert("insert into administrators (admin_username) values ('jana')");
		
		DB::insert("insert into profiles (profile_username, birthday, age) values ('jana',NOW(),18)");
		
		DB::insert("insert into profile_other_accts (profile_id, account) "
				   ."values ((select distinct profiles.profile_id from users, profiles "
				   ."where profiles.profile_username = 'jana'), 'yeah')");
		
		DB::insert("insert into profile_interests (profile_id, interest) "
				   ."values ((select distinct profiles.profile_id from users, profiles "
				   ."where profiles.profile_username = 'jana'), 'twitter')");
		DB::insert("insert into profile_interests (profile_id, interest) "
				   ."values ((select distinct profiles.profile_id from users, profiles "
				   ."where profiles.profile_username = 'jana'), 'instagram')");
		DB::insert("insert into profile_interests (profile_id, interest) "
				   ."values ((select distinct profiles.profile_id from users, profiles "
				   ."where profiles.profile_username = 'jana'), 'facebook')");
		
		User::create(
            [
                'bank_acct_no'		=> '1234567891',
				'username'			=> 'serj',
                'password'			=> Hash::make('123'),
                'first_name'		=> 'Serj',
                'middle_name'		=> 'Serj',
                'last_name'			=> 'Serj',
                'address'			=> 'My Number, My Barangay, My Rules',
				'approved_by'		=> 'almer',
				'approval_date'		=> date('2015-01-01')
            ]
        );
		
		DB::insert("insert into administrators (admin_username) values ('serj')");
		
		DB::insert("insert into profiles (profile_username, birthday, age) values ('serj',NOW(),18)");
		
		DB::insert("insert into profile_other_accts (profile_id, account) "
				   ."values ((select distinct profiles.profile_id from users, profiles "
				   ."where profiles.profile_username = 'serj'), 'yeah')");
		
		DB::insert("insert into profile_interests (profile_id, interest) "
				   ."values ((select distinct profiles.profile_id from users, profiles "
				   ."where profiles.profile_username = 'serj'), 'games')");
		
		 User::create(
            [
                'bank_acct_no'		=> '123456789221',
				'username'			=> 'Juan',
                'password'			=> Hash::make('123'),
                'first_name'		=> 'Juan',
                'middle_name'		=> 'Juan Juan',
                'last_name'			=> 'Juan',
                'address'			=> 'My Number, My Barangay, My Rules',
				'approved_by'		=> 'almer',
				'approval_date'		=> date('2015-02-02')
            ]
        );
		
		DB::insert("insert into profiles (profile_username, birthday, age) values ('Juan',NOW(),18)");
		
		DB::insert("insert into profile_other_accts (profile_id, account) "
				   ."values ((select distinct profiles.profile_id from users, profiles "
				   ."where profiles.profile_username = 'Juan'), 'yeah')");
		
		DB::insert("insert into profile_interests (profile_id, interest) "
				   ."values ((select distinct profiles.profile_id from users, profiles "
				   ."where profiles.profile_username = 'Juan'), 'twitter')");

		function createItem($itemName, $price, $category, $postedBy, $approvedBy, $itemImage){
			$approval = DB::select("select distinct id from users where username like'".$approvedBy."'");
			DB::insert("insert into items (views, item_name, price, category, posted_by, approved_by, avatar)"
				." values (0, '".$itemName."','".$price."','".$category."','".$postedBy."',".$approval[0]->id.",'".$itemImage."')");
		}
		
		// create laptops
		createItem('ACER131','12500.50','gadget','almer','almer', '/res/laptop.jpg');
		createItem('ACER124','12010.00','gadget','almer','almer', '/res/laptop.jpg');
		createItem('ACER127','10999.75','gadget','almer','almer', '/res/laptop.jpg');
		createItem('ACER141','22500.50','gadget','almer','almer', '/res/laptop.jpg');
		
		// create food
		createItem('Cornetto Cookies and Cream','20.00','food','jana','almer', '/res/catcat.jpg');
		createItem('Cornetto Mango','20.00','food','jana','almer', '/res/laptop.jpg');
		createItem('Cornetto Na Masarap','20.00','food','jana','almer', '/res/catcat.jpg');
		createItem('Cornetto Na Mas Masarap','20.00','food','serj','almer', '/res/laptop.jpg');
		createItem('Selecta Rocky Road','125.50','food','serj','almer', '/res/bright.jpg');
		createItem('Selecta 3-in-1','175.75','food','serj','almer', '/res/laptop.jpg');
		createItem('Krispy Kare-Kare','90.00','food','serj','almer', '/res/bright.jpg');
		
    }

}