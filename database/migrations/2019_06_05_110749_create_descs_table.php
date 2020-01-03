<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDescsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('descs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('page_id');
            $table->text('titulo')->nullable();
            $table->text('descricao')->nullable();
            $table->text('descricao1')->nullable();
            $table->string('link')->nullable();
            $table->string('class')->nullable();
            $table->string('path')->nullable();
            $table->string('ordem')->nullable();
            $table->integer('activo')->default(1);
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
        Schema::dropIfExists('descs');
    }
}
