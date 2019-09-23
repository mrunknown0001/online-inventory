<?php

use Illuminate\Database\Seeder;

class UnitOfMeasurementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('unit_of_measurements')->insert([
        	[
        		'name' => 'Box',
        		'code' => 'Box',
        	],
        ]);
    }
}
