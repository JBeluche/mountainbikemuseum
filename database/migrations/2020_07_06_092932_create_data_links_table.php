<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_links', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('field_id');
            $table->unsignedBigInteger('imagedata_id');
            $table->unsignedBigInteger('textdata_id');
            $table->unsignedBigInteger('component_id');
            $table->timestamps();

            $table->foreign('component_id')->references('id')->on('components');
            $table->foreign('field_id')->references('id')->on('component_module_datafields');
            $table->foreign('textdata_id')->references('id')->on('text_data');
            $table->foreign('imagedata_id')->references('id')->on('image_data');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_links');
    }
}
