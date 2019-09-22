<?php

use Illuminate\Database\Seeder;

class UnitOfMeasurements extends Seeder
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
