<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RolAsignado extends Model
{
    protected $table = 'roles_asignados';
	protected $fillable =[
		'id_usuario',
		'id_rol',
	];
	public $timestamps = false;
}
