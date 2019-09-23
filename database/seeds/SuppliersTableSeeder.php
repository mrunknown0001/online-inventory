<?php

use Illuminate\Database\Seeder;

class SuppliersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('suppliers')->insert([
        	[
        		'supplier_name' => 'Faustino Farm & Poultry Supply',
        		'address' => 'Sto. Cristo, Tarlac City',
        	],
        ]);
    }
}
