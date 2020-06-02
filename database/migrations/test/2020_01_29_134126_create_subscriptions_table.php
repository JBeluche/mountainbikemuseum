<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('subscription_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('product_id');
            $table->string('status');
            $table->unsignedBigInteger('payment_platform_id');
            $table->timestamps();

            
            $table->foreign('user_id')->references('id')->on('users')->index('subscriptions_user_id');
            $table->foreign('payment_platform_id')->references('id')->on('payment_platforms');
            $table->foreign('product_id')->references('id')->on('products')->index('subscriptions_product_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscriptions');
    }
}
