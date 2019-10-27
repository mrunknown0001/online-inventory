<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemMunicipalitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_municipalities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('municipality_id')->nullable();
            $table->foreign('municipality_id')->references('municipality_id')->on('municipalities');
            $table->unsignedBigInteger('item_id')->nullable();
            $table->foreign('item_id')->references('item_id')->on('items');
            $table->integer('count')->default(0);
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
        Schema::dropIfExists('item_municipalities');
    }
}
