<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

<<<<<<< HEAD
	/**
=======
    /**
>>>>>>> newGorilla
	 * Run the database seeds.
	 *
	 * @return void
	 */
<<<<<<< HEAD
	public function run()
	{
		Model::unguard();

		// $this->call('UserTableSeeder');
	}
=======
    public function run()
    {
        Model::unguard();
        DB::table('roles')->insert(['name' => 'admin','display_name' => 'Administrator','group' => 0]);

        DB::table('roles')->insert(['name' => 'gov','display_name' => 'Ministry','group' => 1]);
        DB::table('roles')->insert(['name' => 'reg','display_name' => 'Regional','group' => 1]);
        DB::table('roles')->insert(['name' => 'subreg','display_name' => 'Sub Regional','group' => 1]);
        DB::table('roles')->insert(['name' => 'mnc','display_name' => 'Municipality','group' => 1]);
        DB::table('roles')->insert(['name' => 'vet','display_name' => 'Veterinary Service','group' => 1]);

        
        DB::table('roles')->insert(['name' => 'net','display_name' => 'Network Of Stores','group' => 2]);
        DB::table('roles')->insert(['name' => 'stor','display_name' => 'Individual Store','group' => 2]);

        DB::table('roles')->insert(['name' => 'storplant','display_name' => 'Storage Plant','group' => 3]);
        DB::table('roles')->insert(['name' => 'procplant','display_name' => 'Processing Plant','group' => 3]);

        DB::table('users')->insert(['status' => 1,'name' => 'Παντελής Ντυμένος','username' => 'earentill','email' => 'pantelis@backbone.gr','password' => bcrypt('123456'),'customer_id'=>714,'userphoto'=>'5717a5ff3c084.jpeg']);
        DB::table('users')->insert(['status' => 1,'name' => 'Στέλιος Περιστέρης','username' => 'steve','email' => 'stelios@backbone.gr','password' => bcrypt('123456'),'customer_id'=>0,'userphoto'=>'571218b1e9643.jpeg']);
        DB::table('users')->insert(['status' => 1,'name' => 'Υπουργείο','username' => 'ypourgio','email' => 'ypourgio@gov.gr','password' => bcrypt('123456'),'customer_id'=>0,'userphoto'=>'571218b1e9643.jpeg']);

        DB::table('users')->insert(['status' => 1,'name' => 'Περιφέρεια Δυτικής Ελλάδος','username' => 'dytikisellados','email' => 'dytellados@perif.gr','password' => bcrypt('123456'),'customer_id'=>0,'userphoto'=>'571218b1e9643.jpeg']);
        DB::table('users')->insert(['status' => 1,'name' => 'Περ. Ενότητα Ηλείας','username' => 'hleias','email' => 'n.ilias@perif.gr','password' => bcrypt('123456'),'customer_id'=>0,'userphoto'=>'571218b1e9643.jpeg']);

        //        DB::table('users')->insert(['status' => 1,'name' => 'Lidl','username' => 'ypourgio','email' => 'ypourgio@gov.gr','password' => bcrypt('123456'),'customer_id'=>0,'userphoto'=>'571218b1e9643.jpeg']);
        //        DB::table('users')->insert(['status' => 1,'name' => 'Υπουργείο','username' => 'ypourgio','email' => 'ypourgio@gov.gr','password' => bcrypt('123456'),'customer_id'=>0,'userphoto'=>'571218b1e9643.jpeg']);
        //        
        //        DB::table('users')->insert(['status' => 1,'name' => 'Υπουργείο','username' => 'ypourgio','email' => 'ypourgio@gov.gr','password' => bcrypt('123456'),'customer_id'=>0,'userphoto'=>'571218b1e9643.jpeg']);
        //        DB::table('users')->insert(['status' => 1,'name' => 'Υπουργείο','username' => 'ypourgio','email' => 'ypourgio@gov.gr','password' => bcrypt('123456'),'customer_id'=>0,'userphoto'=>'571218b1e9643.jpeg']);




        DB::table('role_user')->insert(['user_id' => 1,'role_id' => 1]);
        DB::table('role_user')->insert(['user_id' => 2,'role_id' => 2]);

        DB::table('role_user')->insert(['user_id' => 3,'role_id' => 2]);
        DB::table('role_user')->insert(['user_id' => 4,'role_id' => 3]);
        DB::table('role_user')->insert(['user_id' => 5,'role_id' => 4]);

    }
>>>>>>> newGorilla

}
