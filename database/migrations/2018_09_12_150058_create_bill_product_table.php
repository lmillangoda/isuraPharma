<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_product', function (Blueprint $table) {
          $table->integer('bill_id')->unsigned();
          $table->integer('product_id')->unsigned();

          $table->primary(['bill_id', 'product_id']);
          $table->timestamps();

          $table->foreign('product_id')
            ->references('id')
            ->on('products')
            ->onDelete('cascade');

          $table->foreign('bill_id')
            ->references('id')
            ->on('bills')
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
        Schema::dropIfExists('bill_product');
    }
}
