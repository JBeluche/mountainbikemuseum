<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTextfieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('textfields', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name');
            $table->longText('content');            
            $table->unsignedBigInteger('component_id');
            $table->bigInteger('index');
            $table->timestamps();

            $table->foreign('component_id')->references('id')->on('components')->index('textfield_component_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('textfields');
    }
}
