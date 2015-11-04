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
//        DB::table('users')->delete();
//		DB::table('administrators')->delete();
		DB::table('items')->delete();

//        User::create(
//            [
//                'bank_acct_no'		=> '1234567890',
//				'username'			=> 'almer',
//                'password'			=> Hash::make('123'),
//                'first_name'		=> 'Almer',
//                'middle_name'		=> 'Taculog',
//                'last_name'			=> 'Mendoza',
//                'address'			=> '6 CM Borja Street Barangay Sta. Ana, Pateros Metro Manila',
//				'approved_by'		=> 'almer'
//            ]
//        );
//		
//		DB::insert("insert into administrators (admin_username) values ('almer')");
//		
//        User::create(
//            [
//                'bank_acct_no'		=> '1234567892',
//				'username'			=> 'jana',
//                'password'			=> Hash::make('123'),
//                'first_name'		=> 'Jana',
//                'middle_name'		=> 'Dela Vega',
//                'last_name'			=> 'Merlan',
//                'address'			=> 'My Number, My Barangay, My Rules',
//				'approved_by'		=> 'almer'
//            ]
//        );
//		
//		DB::insert("insert into administrators (admin_username) values ('jana')");
//		
//		User::create(
//            [
//                'bank_acct_no'		=> '1234567891',
//				'username'			=> 'serj',
//                'password'			=> Hash::make('123'),
//                'first_name'		=> 'Serj',
//                'middle_name'		=> 'Serj',
//                'last_name'			=> 'Serj',
//                'address'			=> 'My Number, My Barangay, My Rules',
//				'approved_by'		=> 'almer'
//            ]
//        );
//		
//		DB::insert("insert into administrators (admin_username) values ('serj')");
		
		function createItem($itemName, $price, $category, $postedBy, $approvedBy, $itemImage){
			DB::insert("insert into items (item_name, price, category, posted_by, approved_by, avatar)"
				." values ('".$itemName."','".$price."','".$category."','".$postedBy."',".$approvedBy.",'".$itemImage."')");
		}
		
		// create laptops
		createItem('ACER131','12500.50','gadget','almer',1, '/res/laptop.jpg');
		createItem('ACER124','12010.00','gadget','almer',1, '/res/laptop.jpg');
		createItem('ACER127','10999.75','gadget','almer',1, '/res/laptop.jpg');
		createItem('ACER141','22500.50','gadget','almer',1, '/res/laptop.jpg');
		
		// create food
		createItem('Cornetto Cookies and Cream','20.00','food','jana',2, '/res/catcat.jpg');
		createItem('Cornetto Mango','20.00','food','jana',2, '/res/laptop.jpg');
		createItem('Cornetto Na Masarap','20.00','food','jana',2, '/res/catcat.jpg');
		createItem('Cornetto Na Mas Masarap','20.00','food','serj',3, '/res/laptop.jpg');
		createItem('Selecta Rocky Road','125.50','food','serj',3, '/res/bright.jpg');
		createItem('Selecta 3-in-1','175.75','food','serj',3, '/res/laptop.jpg');
		createItem('Krispy Kare-Kare','90.00','food','serj',3, '/res/bright.jpg');
		
    }

}