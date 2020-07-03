<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComponentModuleDatafieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('component_module_datafields', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedBigInteger('tag_id');
            $table->unsignedBigInteger('component_module_id');
            $table->bigInteger('index');

            $table->timestamps();

            $table->foreign('tag_id')->references('id')->on('available_tags');
            $table->foreign('component_module_id')->references('id')->on('component_modules');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('component_module_datafields');
    }
}
