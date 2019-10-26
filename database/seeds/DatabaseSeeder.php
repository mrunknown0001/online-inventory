<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(MunicipalitiesTableSeeder::class);
        $this->call(BarangaysTableSeeder::class);
        $this->call(UnitOfMeasurementsTableSeeder::class);
        $this->call(ItemCategoriesTableSeeder::class);
        $this->call(SuppliersTableSeeder::class);
        $this->call(FarmsTableSeeder::class);
    }
}
