<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannerLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banner_lines', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idbannner');
            $table->string('titulo')->nullable();
            $table->string('subtitulo')->nullable();
            $table->text('descricao')->nullable();
            $table->string('link')->nullable();
            $table->string('path')->nullable();
            $table->string('ordem')->nullable();
            $table->integer('activo')->nullable();
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
        Schema::dropIfExists('banner_lines');
    }
}
