<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComponentPageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('component_page', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('component_id');
            $table->unsignedBigInteger('page_id');
            $table->timestamps();

            //Set a unique key so you can't have twice the same link
            $table->unique(['component_id', 'page_id']);

            //You can also make sure it deletes the link when the record component is deleted
            $table->foreign('page_id')->references('id')->on('pages')->onDelete('cascade');
            $table->foreign('component_id')->references('id')->on('components')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('component_page');
    }
}
