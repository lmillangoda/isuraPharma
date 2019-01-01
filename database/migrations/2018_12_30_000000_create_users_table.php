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
            $table->increments('id');
            $table->string('fName');
            $table->string('mName');
            $table->string('lName');
            $table->string('hNo');
            $table->string('add1');
            $table->string('add2');
            $table->string('town');
            $table->string('tel');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('branch_id')->unsigned();
            $table->integer('role_id')->unsigned();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('branch_id')
              ->references('id')
              ->on('branches')
              ->onDelete('cascade');

              $table->foreign('role_id')
                ->references('id')
                ->on('roles')
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
        Schema::dropIfExists('users');
    }
}
