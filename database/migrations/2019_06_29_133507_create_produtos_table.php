<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->string('cod_art')->unique()->nullable();
            $table->string('sku')->nullable();
            $table->text('subtitulo')->nullable();
            $table->text('descricao')->nullable();
            $table->text('obs')->nullable();
            $table->integer('categoria_id')->nullable();
            $table->integer('subcategoria_id')->nullable();
            $table->integer('familia_id')->nullable();
            $table->integer('subfamilia_id')->nullable();
            $table->integer('prazos_id')->nullable();
            $table->string('lote')->nullable();
            $table->string('link')->nullable();
            $table->string('path')->nullable();
            $table->string('pathbig')->nullable();
            $table->string('ordem')->nullable();
            $table->integer('activo')->default(1);
            $table->integer('visualizado')->nullable();
            $table->integer('requisitado')->nullable();
            $table->integer('sexo')->nullable();
            $table->integer('desconto')->nullable();
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
        Schema::dropIfExists('produtos');
    }
}
