<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemBarangaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_barangays', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('barangay_id')->nullable();
            $table->foreign('barangay_id')->references('barangay_id')->on('barangays');
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
        Schema::dropIfExists('item_barangays');
    }
}
