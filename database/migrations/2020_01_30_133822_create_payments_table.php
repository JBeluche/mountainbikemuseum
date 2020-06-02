<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('payment_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('product_id');
            $table->string('description');
            $table->string('price');
            $table->string('is_subscription');
            $table->unsignedBigInteger('payment_platforms_id');
            $table->timestamps();

            
            $table->foreign('payment_platforms_id')->references('id')->on('payment_platforms');
            $table->foreign('user_id')->references('id')->on('users')->index('payments_user_id');
            $table->foreign('product_id')->references('id')->on('products')->index('payments_product_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
