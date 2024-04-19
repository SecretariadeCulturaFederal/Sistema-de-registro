<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//Importacion de modelos
use App\Ejemplo1;
use App\Ejemplo2;
use App\Ejemplo3;
use App\Estado;
use App\Municipio;
use App\RegistroDatosPersonales;

class RegistroProyecto extends Model
{
	public function getRouteKeyName()
	{
		return 'folio';
	}


	protected $table = 'registro_proyecto';
	protected $primaryKey = 'id';
	protected $fillable = [
		'id_registro',
		'nombreProyecto',
		'participacion',
		'integrantes',
		'catProyecto',
		'catEtapa',
		'semblanza',
		'catDuracion',
	
		'justificacion_1',	
		'justificacion_2',
		'justificacion_3',
		'pr_adicional_1',
		
		'calleResidencia',
		'numeroResidencia',
		'cpResidencia',
		'idEstado',
		'idMunicipio',
		'idLocalidad',

		'status',
		'created_at',
		'updated_at',
		'verificacion',
		'verificacion_at',
		'verificacion_by',
	];
	
	//Relación de la tabla registro_datosPersonales con otras tablas en la Base de Datos
	public function pr_estado()
    {
        return $this->belongsTo(Estado::class, 'idEstado');
    }
	public function pr_municipio()
    {
        return $this->belongsTo(Municipio::class, 'idMunicipio');
    }
	public function pr_integrantes()
    {
        return $this->belongsTo(Ejemplo1::class, 'integrantes');
    }
	public function pr_catProyecto()
    {
        return $this->belongsTo(Ejemplo2::class, 'catProyecto');
    }
	public function pr_catEtapa()
    {
        return $this->belongsTo(Ejemplo3::class, 'catEtapa');
    }
	
	//Registro de otras tablas, con la tabla registro_proyecto mediante el id
	public function registroDatosPersonales()
    {
        return $this->belongsTo(RegistroDatosPersonales::class, 'id_registro');
    }	
}



