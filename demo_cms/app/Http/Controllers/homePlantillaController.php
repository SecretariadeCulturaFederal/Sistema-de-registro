<?php

namespace App\Http\Controllers; //donde se encuentran los controllers


use Illuminate\Http\Request; // La clase `Request` se utiliza para manejar las solicitudes HTTP entrantes.
use Carbon\Carbon;


class homePlantillaController extends Controller // se extiende la clase base controller para crear el controlador 
{
    
    public function index()
    {
             return view('home.homePlantilla'); //se devuelve una vista 
    }


}

