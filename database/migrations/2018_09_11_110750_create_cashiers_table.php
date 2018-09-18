<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCashiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cashiers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fName');
            $table->string('mName');
            $table->string('lName');
            $table->string('hNo');
            $table->string('add1');
            $table->string('add2');
            $table->string('town');
            $table->string('tel');
            $table->DateTime('dob');
            $table->string('nic')->unique();
            $table->integer('branch_id')->unsigned();
            $table->timestamps();

            $table->foreign('branch_id')
              ->references('id')
              ->on('branches')
              ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cashiers');
    }
}