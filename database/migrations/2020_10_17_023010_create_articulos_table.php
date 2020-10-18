<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',100);
            $table->string('contenido',65535);
            $table->string('estatus',2);
            $table->string('foto');
            $table->unsignedBigInteger('IDcategoria')->index();
            $table->foreign('IDcategoria')->references('IDcategoria')->on('categorias');
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
        Schema::dropIfExists('articulos');
    }
}
