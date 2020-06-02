<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFootersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('footers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('website_name');
            $table->string('address_part1');
            $table->string('address_part2');
            $table->string('name_company');
            $table->string('name_owner');
            $table->string('phone_number');
            $table->string('email');
            $table->string('facebook');
            $table->string('instagram');
            $table->string('monday');
            $table->string('tuesday');
            $table->string('wednesday');
            $table->string('thursday');
            $table->string('friday');
            $table->string('saterday');
            $table->string('sunday');
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
        Schema::dropIfExists('footers');
    }
}
