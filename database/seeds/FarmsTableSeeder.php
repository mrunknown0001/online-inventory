<?php

use Illuminate\Database\Seeder;

class FarmsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('farms')->insert([
        	[
        		'name' => 'Brookside Farms Corporation',
        		'description' => 'Bamban, Tarlac',
        	]
        ]);
    }
}
