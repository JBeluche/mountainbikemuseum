<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTextDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('text_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('key_name')->unique();
            $table->unsignedBigInteger('category_id');
            $table->text('nl_text');
            $table->text('en_text');
            $table->text('de_text');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('text_categories');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('text_data');
    }
}
