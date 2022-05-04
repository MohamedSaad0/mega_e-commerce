<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_product', function (Blueprint $table) {
            $table->id();
            $table->unSignedBigInteger('product_id');
            $table->unsignedBigInteger('order_id');
            $table->integer('product_quantity');
            $table->integer('price');
            $table->integer('total_price');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete("cascade")->onUpdate("cascade");
            $table->foreign('product_id')->references('id')->on('products')->onDelete("cascade")->onUpdate("cascade");
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
        Schema::dropIfExists('order_product');
    }
};
