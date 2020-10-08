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
            $table->string('shippers_name', 100)->nullable();
            $table->string('shippers_address', 150)->nullable();
            $table->bigInteger('origin')->unsigned();
            $table->foreign('origin')->references('farm_id')->on('farms');
            $table->string('destination', 150)->nullable();
            $table->string('destination_address', 150)->nullable();

            $table->date('valid_until')->nullable();
            $table->string('livestock_handlers_no', 20)->nullable();
            $table->string('shippers_contact_no', 20)->nullable();
            $table->string('livestock_carrier', 150)->nullable();
            $table->string('vehicle_type', 30)->nullable();
            $table->string('plate_no', 10)->nullable();

            $table->string('inspected_by', 150)->nullable();
            $table->string('inspectors_address', 150)->nullable();
            $table->string('approved_by', 150)->nullable();
            $table->string('approvers_address', 150)->nullable();
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
