<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            
            $table->bigIncrements('id');
            $table->string('name');            
            $table->unsignedBigInteger('nav_link_id')->nullable();
            $table->string('view');
            $table->string('lang');            
            $table->timestamps();

            $table->foreign('nav_link_id')->references('id')->on('nav_links')->index('pages_nav_link_id');
            $table->foreign('lang')->references('name')->on('languages')->index('page_language_name');
            $table->foreign('view')->references('name')->on('views')->index('page_view_name');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
