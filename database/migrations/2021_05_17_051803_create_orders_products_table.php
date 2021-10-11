<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_products', function (Blueprint $table) {
            $table->id();
            $table -> integer('order_id');
            $table -> integer('user_id');
            $table -> integer('product_id');
            $table -> string('product_code',100);
            $table -> string('product_name',100);
            $table -> string('product_size',100);
            $table -> float('product_price');
            $table -> integer('product_qty');

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
        Schema::dropIfExists('orders_products');
    }
}
