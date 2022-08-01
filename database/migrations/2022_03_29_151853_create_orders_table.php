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
            $table->string("o_code");
            $table->double("total");
            $table->double("deliveryCharge");
            $table->double("grandTotal");
            $table->set('deliveryStatus', ['inprocess', 'delivered']);
            $table->string("region");
            $table->string("city");
            $table->string("area");
            $table->string("address");
            $table->foreignId("user_id");
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
        Schema::dropIfExists('orders');
    }
}
