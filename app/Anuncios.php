<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anuncios extends Model
{   
    protected $fillable = ['tipo', 'nombre', 'color', 'tipo_mascota', 'fecha', 'imagen', 'descripcion', 'nombre_contacto', 'numero_contacto'];
    //
}
