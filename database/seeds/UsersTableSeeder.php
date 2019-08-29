<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	[
        		'username' => 'admin',
        		'firstname' => 'Admin',
        		'middlename' => 'AdminE',
        		'lastname' => 'Admin',
        		'email' => 'admin@localhost',
        		'password' => bcrypt('password'),
        		'user_type' => 1,
        	],
        ]);
    }
}
