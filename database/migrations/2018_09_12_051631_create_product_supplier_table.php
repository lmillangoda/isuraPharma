<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductSupplierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_supplier', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('product_id')->unsigned();
          $table->integer('supplier_id')->unsigned();

          $table->unique(['product_id', 'supplier_id']);
          $table->timestamps();

          $table->foreign('product_id')
            ->references('id')
            ->on('products')
            ->onDelete('cascade');

          $table->foreign('supplier_id')
            ->references('id')
            ->on('suppliers')
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
        Schema::dropIfExists('product_supplier');
    }
}
