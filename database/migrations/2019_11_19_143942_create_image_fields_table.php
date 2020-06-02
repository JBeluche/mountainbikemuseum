<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImageFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_fields', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('component_id');
            $table->string('name');
            $table->bigInteger('index');
            $table->timestamps();

            $table->foreign('component_id')->references('id')->on('components')->index('image_component_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('image_fields');
    }
}
