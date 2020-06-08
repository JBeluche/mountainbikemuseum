<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTextDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('text_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('key_name');
            $table->unsignedBigInteger('category_id');
            $table->string('lang');
            $table->text('text');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('text_categories');
            $table->foreign('lang')->references('name')->on('languages');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('text_data');
    }
}
