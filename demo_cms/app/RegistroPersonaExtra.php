<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//Importacion de modelos
use App\Nacionalidad;
use App\Genero;
use App\RegistroDatosPersonales;

class RegistroPersonaExtra extends Model
{
	public function getRouteKeyName()
	{
		return 'folio';
	}


	protected $table = 'registro_personaExtra';
	protected $primaryKey = 'id';
	protected $fillable = [
		'id_registro',
		'pe_nombres',
		'pe_aPaterno',
		'pe_aMaterno',
		'pe_idNacionalidad',
		'pe_curp',
		'pe_genero',
		'pe_seudonimo',
	
		'pe_email',	
		'pe_emailVerf',
		'pe_telUno',
		'pe_telDos',

		'pe_semblanza',
		
		'status',
		'created_at',
		'updated_at',
		'verificacion',
		'verificacion_at',
		'verificacion_by',
	];

	//Relación de la tabla registro_personaExtra con otras tablas en la Base de Datos
	public function pe_nacionalidad()
    {
        return $this->belongsTo(Nacionalidad::class, 'pe_idNacionalidad');
    }
	public function pe_idGenero()
    {
        return $this->belongsTo(Genero::class, 'pe_genero');

    }
	//Registro de otras tablas, con la tabla registo_personaExtra mediante el id
	public function registroDatosPersonales()
    {
        return $this->belongsTo(RegistroDatosPersonales::class, 'id_registro');
    }
}



