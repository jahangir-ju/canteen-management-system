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
            $table->bigIncrements('id');
            $table->string('user_id');
            $table->string('phone');
            $table->string('email');
            $table->string('address');
            $table->string('payment_method');
            $table->string('transactionID')->nullable();
            $table->string('total_amount')->default(0);;
            $table->string('payment_amount')->default(0);
            $table->string('status')->comments("1=Pending, 5=Confirm, 10=Complete")->default(1);
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
