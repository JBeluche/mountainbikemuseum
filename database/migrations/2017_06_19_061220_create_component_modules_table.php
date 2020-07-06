<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComponentModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('component_modules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name');
            $table->integer('textfields_amount');
            $table->integer('images_amount');
            $table->integer('listitem_amount');
            $table->unsignedBigInteger('component_module_blueprint_id')->nullable();
            $table->integer('is_custom');
            $table->timestamps();

            $table->foreign('component_module_blueprint_id')->references('id')->on('component_module_blueprints');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('component_modules');
    }
}
