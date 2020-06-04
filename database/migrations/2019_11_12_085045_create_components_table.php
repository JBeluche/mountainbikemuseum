<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComponentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('components', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('page_id');
            $table->unsignedBigInteger('component_list_id');
            $table->string('name');
            $table->timestamps();

            $table->foreign('page_id')->references('id')->on('pages')->index('page_component_ref');
            $table->foreign('component_list_id')->references('id')->on('component_lists')->index('component_component_list');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('components');
    }
}
