<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_carts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('cart_id');
            $table->unsignedInteger('product_id');
            $table->string('product_name');
            $table->integer('product_price');
            $table->string('product_display_price');
            $table->string('product_description');
            $table->string('product_photo');
            $table->integer('quantity');
            $table->timestamps();
            $table->foreign('cart_id')->references('id')->on('carts');
            $table->foreign('product_id')->references('id')->on('products');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products_carts');
    }
}
