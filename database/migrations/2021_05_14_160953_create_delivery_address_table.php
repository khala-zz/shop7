<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_address', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('user_email',100) -> nullable();
            $table->string('name',100) -> nullable();
            $table->string('address',150) -> nullable();
            $table->string('city',50) -> nullable();
            $table->string('state',50) -> nullable();
            $table->string('mobile',50);
            $table->string('postal_code')->nullable();
            
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
        Schema::dropIfExists('delivery_address');
    }
}
