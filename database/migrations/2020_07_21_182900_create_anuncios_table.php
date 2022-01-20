<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnunciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anuncios', function (Blueprint $table) {
            $table->id();
            $table->string('tipo', 100);
            $table->string('nombre', 100);
            $table->string('color', 100);
            $table->string('tipo_mascota', 100);
            $table->date('fecha');
            $table->string('imagen', 100);
            $table->text('descripcion');
            $table->string('nombre_contacto', 100);
            $table->string('numero_contacto', 100);
            $table->string('codigo_publicacion', 100);
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
        Schema::dropIfExists('anuncios');
    }
}
