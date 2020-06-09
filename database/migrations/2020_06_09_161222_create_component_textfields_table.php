<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComponentTextfieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('component_textfields', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('text_data_id');
            $table->unsignedBigInteger('component_id');
            $table->integer('index');
            $table->timestamps();

            $table->foreign('text_data_id')->references('id')->on('text_data');
            $table->foreign('component_id')->references('id')->on('components');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('component_textfields');
    }
}
