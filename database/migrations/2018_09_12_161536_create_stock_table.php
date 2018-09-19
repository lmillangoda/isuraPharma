<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock', function (Blueprint $table) {
          $table->integer('branch_id')->unsigned();
          $table->integer('product_id')->unsigned();
          $table->DateTime('expDate');
          $table->integer('amount');

          $table->primary(['branch_id', 'product_id']);
          $table->timestamps();

          $table->foreign('product_id')
            ->references('id')
            ->on('products')
            ->onDelete('cascade');

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
        Schema::dropIfExists('stock');
    }
}
