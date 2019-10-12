<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('item_id');
            $table->string('item_name', 100)->nullable();
            $table->string('item_code', 10)->nullable();
            $table->string('item_description')->nullable();
            $table->bigInteger('item_category_id')->unsigned();
            $table->foreign('item_category_id')->references('item_category_id')->on('item_categories');
            $table->bigInteger('unit_of_measurement_id')->unsigned();
            $table->foreign('unit_of_measurement_id')->references('unit_of_measurement_id')->on('unit_of_measurements');
            $table->integer('critical_level')->nullable();
            $table->boolean('active')->default(1);
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
        Schema::dropIfExists('items');
    }
}
