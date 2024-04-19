<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    protected $table = 'asistencia'; // Nombre de la tabla en la base de datos

    protected $primaryKey = 'id'; // Nombre de la clave primaria

    // Lista de columnas que pueden ser llenadas masivamente
    protected $fillable = [

        'lunes',
        'martes',
        'miercoles',
        'jueves',
        'viernes',
   
    ];
}

