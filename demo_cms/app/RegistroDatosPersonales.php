<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/*Importacion de Modelos*/
use App\Nacionalidad;
use App\Genero;
use App\Estado;
use App\Municipio;
use App\RegistroProyecto;
use App\RegistroArchivos;
use App\RegistroPersonaExtra;
class RegistroDatosPersonales extends Model
{
	public function getRouteKeyName()
	{
		return 'folio';
	}


	protected $table = 'registro_datosPersonales';
	protected $primaryKey = 'id';
	protected $fillable = [
		'status',
		'folio',
		'nombres',
		'apellidoPaterno',
		'apellidoMaterno',
		'usuarioTemporal',
		'contrasenia',
		'fechaNacimiento',
		'idNacionalidad',
		'curp',
		'genero',
		'seudonimo',
		'adicional_1',

		'calleResidencia',
		'numeroResidencia',
		'cpResidencia',
		'idEstado',
		'idMunicipio',
		'idLocalidad',
		
		'email',	
		'emailVerf',
		'tel_uno',
		'tel_dos',

		'opcion_1',
		'opcion_2',
		'opcion_3',
		'opcion_4',
		'opcion_5',
		'opcion_6',
		'opcion_7',
		'opcion_8',
		'opcion_9',
		'opcion_10',
		'otra_opcion',

		'created_at',
		'updated_at',
	
		'verificacion',
		'verificacion_at',
		'verificacion_by',
	];
	
	//Relación de la tabla registro_datosPersonales con otras tablas en la Base de Datos
	public function nacionalidad()
    {
        return $this->belongsTo(Nacionalidad::class, 'idNacionalidad');
    }
	public function idGenero()
    {
        return $this->belongsTo(Genero::class, 'genero');
    }
	public function estado()
    {
        return $this->belongsTo(Estado::class, 'idEstado');
    }
	public function municipio()
    {
        return $this->belongsTo(Municipio::class, 'idMunicipio');
    }

	//Registro de otras tablas, con la tabla registro_datosPersonales mediante el id
   
	//Relación de la tabla registro_archivos con la tabla registro_datosPersonales
	public function archivos()
    {
        return $this->hasOne(RegistroArchivos::class, 'id_registro');
    }
	//Relación de la tabla registro_proyectos con la tabla registro_datosPersonales
    public function proyectos()
    {
        return $this->hasOne(RegistroProyecto::class, 'id_registro');
    }
	//Relación de la tabla registro_personaExtra con la tabla registro_datosPersonales
    public function personaExtra()
    {
        return $this->hasOne(RegistroPersonaExtra::class, 'id_registro');
    }


}



