<?php

use Illuminate\Database\Seeder;

class ItemCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('item_categories')->insert([
        	[
	        	'item_category_name' => 'Others',
	        	'description' => 'Others',
	        ],
            [
                'item_category_name' => 'Anti Rabies',
                'description' => 'Anti Rabies',
            ],
        ]);
    }
}
