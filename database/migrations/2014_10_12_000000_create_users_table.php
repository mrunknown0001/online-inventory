<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('user_id');
            $table->string('firstname', 30)->nullable();
            $table->string('middlename', 30)->nullable();
            $table->string('lastname', 30)->nullable();
            $table->string('suffix_name', 5)->nullable();
            $table->string('username', 30)->unique()->nullable();
            $table->string('email', 60)->unique()->nullable();
            $table->string('password', 80)->nullable();
            $table->tinyInteger('user_type')->nullable()->default(2); // admin and employee
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
