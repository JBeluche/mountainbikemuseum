<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComponentListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('component_lists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name');
            $table->integer('textfields_amount');
            $table->integer('images_amount');
            $table->integer('listitem_amount');
            $table->integer('is_custom');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('component_lists');
    }
}
