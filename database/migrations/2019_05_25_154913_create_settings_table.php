<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('contacto1')->nullable();
            $table->string('contacto2')->nullable();
            $table->string('rua')->nullable();
            $table->string('localidade')->nullable();
            $table->string('cidade')->nullable();
            $table->string('codigopostal')->nullable();
            $table->string('email1')->nullable();
            $table->string('email2')->nullable();
            $table->string('website')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
