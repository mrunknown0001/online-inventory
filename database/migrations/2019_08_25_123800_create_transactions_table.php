<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('transaction_id');
            $table->tinyInteger('transaction_type')->default(1); // 1 for in, 0 for out
            $table->string('reference_number', 20)->nullable();
            $table->bigInteger('supplier_id')->unsigned()->nullable();
            $table->foreign('supplier_id')->references('supplier_id')->on('suppliers');
            $table->bigInteger('customer_id')->unsigned()->nullable();
            $table->foreign('customer_id')->references('customer_id')->on('customers');
            $table->bigInteger('municipality_id')->unsigned()->nullable();
            $table->foreign('municipality_id')->references('municipality_id')->on('municipalities');
            $table->bigInteger('barangay_id')->unsigned()->nullable();
            $table->foreign('barangay_id')->references('barangay_id')->on('barangays');
            $table->bigInteger('item_id')->unsigned()->nullable();
            $table->foreign('item_id')->references('item_id')->on('items');
            $table->bigInteger('unit_of_measurement_id')->unsigned()->nullable();
            $table->foreign('unit_of_measurement_id')->references('unit_of_measurement_id')->on('unit_of_measurements');
            $table->integer('quantity')->nullable();
            $table->float('price', 8,2)->nullable();
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
        Schema::dropIfExists('transantions');
    }
}
