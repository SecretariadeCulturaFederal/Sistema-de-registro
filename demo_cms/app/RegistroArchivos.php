<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//Importacion de modelos
use App\RegistroDatosPersonales;

class RegistroArchivos extends Model
{
	public function getRouteKeyName()
	{
		return 'folio';
	}


	protected $table = 'registro_archivos';
	protected $primaryKey = 'id';
	protected $fillable = [
		'id_registro',
		'pdf_1',
		'pdf_2',
		'pdf_3',
		'pdf_4',
		'img_1',
		'img_2',
		'img_3',
		'img_4',
		'archivo_1',
		'archivo_2',	

		'created_at',
		'updated_at',
	];
	public function registroDatosPersonales()
    {
        return $this->belongsTo(RegistroDatosPersonales::class, 'id_registro');
    }
}



