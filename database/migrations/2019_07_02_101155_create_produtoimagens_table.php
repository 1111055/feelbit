<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutoimagensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtoimagens', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('produto_id');
            $table->integer('cont');
            $table->string('path');
            $table->string('pathbig')->nullable();
            $table->string('ordem')->nullable();
            $table->integer('activo')->nullable()->default(1);
            $table->integer('destacar')->default(0);
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
        Schema::dropIfExists('produtoimagens');
    }
}
