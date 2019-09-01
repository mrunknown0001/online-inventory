<?php

use Illuminate\Database\Seeder;

class MunicipalitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('municipalities')->insert([
        	[
        		'name' => 'Anao', // 1
        	],
        	[
        		'name' => 'Camiling', // 2
        	],
        	[
        		'name' => 'Mayantoc', // 3
        	],
        	[
        		'name' => 'Moncada', // 4
        	],
        	[
        		'name' => 'Paniqui', // 5
        	],
        	[
        		'name' => 'Pura', // 6
        	],
        	[
        		'name' => 'Ramos', // 7
        	],
        	[
        		'name' => 'San Clemente', // 8
        	],
        	[
        		'name' => 'San Manuel', // 9
        	],
        	[
        		'name' => 'Sta. Ignacia', // 10
        	],
        	[
        		'name' => 'Gerona', // 11
        	],
        	[
        		'name' => 'San Jose', // 12
        	],
        	[
        		'name' => 'Tarlac City', // 13
        	],
        	[
        		'name' => 'Victoria', // 14
        	],
        	[
        		'name' => 'Bamban', // 15
        	],
        	[
        		'name' => 'Capas', // 16
        	],
        	[
        		'name' => 'Concepcion', // 17
        	],
        	[
        		'name' => 'Lapaz', // 18
        	],
        ]);
    }
}
