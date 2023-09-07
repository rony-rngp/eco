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
            $table->foreignId('user_id')->constrained('users');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('address');
            $table->string('country');
            $table->string('division');
            $table->string('district');
            $table->string('zip_code');
            $table->string('mobile');
            $table->string('email')->nullable();
            $table->float('shipping_charges')->nullable();
            $table->string('coupon_code')->nullable();
            $table->float('coupon_amount')->nullable();
            $table->string('order_status');
            $table->string('payment_method');
            $table->string('payment_gateway');
            $table->string('transaction_id')->nullable();
            $table->string('status')->nullable();
            $table->float('grand_total');
            $table->float('amount')->nullable();
            $table->string('currency')->nullable();
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
