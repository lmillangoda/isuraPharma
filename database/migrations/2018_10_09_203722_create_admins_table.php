<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fName');
            $table->string('mName');
            $table->string('lName');
            $table->string('hNo');
            $table->string('add1');
            $table->string('add2');
            $table->string('town');
            $table->string('tel');
            $table->date('dob');
            $table->string('nic')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('branch_id')->unsigned();
            $table->rememberToken();
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
        Schema::dropIfExists('admins');
    }
}
