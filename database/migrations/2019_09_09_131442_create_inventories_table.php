<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->bigIncrements('inventory_id');
            $table->unsignedBigInteger('item_id')->nullable();
            $table->foreign('item_id')->references('item_id')->on('items');
            $table->integer('quantity')->default(0);
            $table->unsignedBigInteger('unit_of_measurement_id')->nullable();
            $table->foreign('unit_of_measurement_id')->references('unit_of_measurement_id')->on('unit_of_measurements');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventories');
    }
}
