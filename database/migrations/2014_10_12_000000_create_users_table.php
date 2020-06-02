<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('mollie_id')->nullable();
            $table->string('paypal_id')->nullable();
            $table->string('voorletters')->nullable();
            $table->string('tussenvoegsel')->nullable();
            $table->string('achternaam')->nullable();
            $table->string('telefoon')->nullable();
            $table->string('land')->nullable();
            $table->string('postcode')->nullable();
            $table->string('plaats')->nullable();
            $table->string('huisnummer')->nullable();
            $table->string('toevoeging_huisnummer')->nullable();
            $table->string('straatnaam')->nullable();
            $table->string('type_klant')->nullable();
            $table->string('bedrijfsnaam')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
