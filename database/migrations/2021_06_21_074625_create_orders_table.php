<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('status', 50)->default('pending');
           
            $table->bigInteger('total_price');
            $table -> string('user_email',100);
            $table->string('name',100) -> nullable();
            $table->string('address',150) -> nullable();
            $table->string('city',50) -> nullable();
            $table->string('state',50) -> nullable();
            $table->string('mobile',50);
            $table->string('postal_code')->nullable();
            $table -> float('shipping_charges') -> nullable();
            $table -> string('coupon_code',150) -> nullable();
            $table -> float('coupon_amount') -> nullable();
            $table -> string('payment_method',100);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
