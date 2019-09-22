<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShippingPermitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_permits', function (Blueprint $table) {
            $table->bigIncrements('shipping_permit_id');
            $table->string('permit_no', 15)->nullable();
            $table->bigInteger('origin')->unsigned();
            $table->foreign('origin')->references('farm_id')->on('farms');
            $table->bigInteger('destination')->unsigned();
            $table->foreign('destination')->references('farm_id')->on('farms');
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
        Schema::dropIfExists('shipping_permits');
    }
}
