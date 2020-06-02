<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('component_id');
            $table->unsignedBigInteger('list_item_id')->nullable();
            $table->text('content');
            $table->timestamps();

            
            $table->foreign('component_id')->references('id')->on('components')->index('list_items_component_id');
            $table->foreign('list_item_id')->references('id')->on('list_items')->index('list_items_list_items_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('list_items');
    }
}
