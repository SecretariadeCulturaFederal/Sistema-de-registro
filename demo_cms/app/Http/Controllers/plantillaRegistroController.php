<?php

namespace App\Http\Controllers;


/* Importaciones de componentes de Laravel */ 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use Illuminate\Routing\UrlGenerator;
use Carbon\Carbon;
use File;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;

/* Importaciones de solicitudes (Requests) */ 
use App\Http\Requests\formularioPlantillaRequest;
use App\Http\Requests\editFormularioRequest;
use App\Mail\SendMailable;

/* Importaciones de modelos y recursos */ 
use App\Actividad;
use App\Asistencia;
use App\Contactos;
use App\PreguntaFrecuente;
use App\Genero;
use App\Estado;
use App\Ejemplo1;
use App\Ejemplo2;
use App\Ejemplo3;
use App\Ejemplo4;
use App\Ejemplo5;
use App\Localidad;
use App\Municipio;
use App\Nacionalidad;
use App\RegistroDatosPersonales;
use App\rolesAsignados;
use App\RegistroPersonaExtra;
use App\RegistroProyecto;
use App\RegistroArchivos;
use App\Rol;
use App\RolAsignado;
use App\User;




/*---------------------------------
|  Clase plantillaController
|---------------------------------*/
class plantillaRegistroController extends Controller
{
    /**
     * Function index
     *
     * @return void
     */
    public function index()
    {
        //
    }
    public function generarFolio($longitud = 8)
    {
        $caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        return substr(str_shuffle($caracteres), 0, $longitud);
    }
    public function generarOtroFolio($longitud = 8)
    {
        $caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        return substr(str_shuffle($caracteres), 0, $longitud);
    }
    public function generarUsuarioTemporal($longitud = 4)
    {
        $caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        return substr(str_shuffle($caracteres), 0, $longitud);
    }
    public function generarContrasenia($longitud = 8)
    {
        $caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890$%&';
        return substr(str_shuffle($caracteres), 0, $longitud);
    }



/*
 |--------------------------------------------------------------------------
 | Create
 | Este método muestra el formulario de registro si la fecha actual se encuentra dentro del período de convocatoria.
 | En caso contrario, muestra un mensaje de error indicando que la convocatoria ha concluido.
 |--------------------------------------------------------------------------
 */

    public function create()
    {
        if ((Carbon::now() > date('2023-11-12 00:00:00')) && (Carbon::now() < date('2023-12-31 23:59:59'))) {
            // Se obtienen los datos activos desde la base de datos.
            $estados = Estado::where('status', '=', 1)->get(); 
     
            $municipios = Municipio::where('status', '=', 1)->get(); 
            $nacionalidades = Nacionalidad::where('status', '=', 1)->get(); 
            $generos = Genero::where('status', '=', 1)->get();
            $categoriaEjemplo1 = Ejemplo1::where('status', '=',1)->get();
            $categoriaEjemplo2 = Ejemplo2::where('status', '=',1)->get();
            $categoriaEjemplo3 = Ejemplo3::where('status', '=',1)->get();
            $categoriaEjemplo4 = Ejemplo4::where('status', '=',1)->get();
            $categoriaEjemplo5 = Ejemplo5::where('status', '=',1)->get();

            // Número de folio inicial.
            $folio = 1;
            
            // FormularioPlantilla"
            return view('plantilla.formularioPlantilla', [
                'registroDatosPersonales' => new RegistroDatosPersonales,
                'registroPersonaExtra' => new registroPersonaExtra,
                'registroProyecto' => new registroProyecto,
                'registroArchivos' => new registroArchivos,

                'estados' => $estados,

                'municipios' => $municipios,
                'nacionalidades' => $nacionalidades,
                'generos' => $generos,
                'categoriaEjemplo1' => $categoriaEjemplo1,
                'categoriaEjemplo2' => $categoriaEjemplo2,
                'categoriaEjemplo3' => $categoriaEjemplo3,
                'categoriaEjemplo4' => $categoriaEjemplo4,
                'categoriaEjemplo5' => $categoriaEjemplo5,
                'folio' => $folio,
            ]);
          
    

        } else {
            // Muestra un mensaje de error y aborta la solicitud si la convocatoria ha concluido.
            abort(403, "El registro a la convocatoria concluyó el [hora y fecha] (horario de la Ciudad de México).");
        }
    }

/*
 |--------------------------------------------------------------------------
 | enviarCorreo
 | La función es invocada para enviar un correo electrónico relacionado con un registro específico.
 |--------------------------------------------------------------------------
 */

 public function enviarCorreo(RegistroDatosPersonales $RegistroDatosPersonales) 
    {
        //Se obtiene información para la redacción del correo
        $registro = $RegistroDatosPersonales::where('id', '=', $RegistroDatosPersonales->id)->get();
        foreach ($registro as $r) {
            $nombreCompleto = $r->nombres . ' ' . $r->apellidoPaterno . ' ' . $r->apellidoMaterno;
            $emailUsuario = $r->email;
            $id = $r->id;
            $folio = $r->folio;
        } 

        //Se confiugura la dirección de correo electrónico a la que se enviará el correo. $emailUsuario es la variable que contiene la dirección de correo.
        try {
            $mail = Mail::to($emailUsuario)->send(new SendMailable($emailUsuario, $nombreCompleto, $folio, $id));
        } catch (\Throwable $excepcionCorreo) {
            throw $excepcionCorreo;
        }

        //Vista de confirmación
        if ($mail) {
            return view('home.plantillaRegistrado', [ 
                'folio' => $folio,
            ]);
        } else {
            echo 'Rechazo';
        }
    }

/*
 |--------------------------------------------------------------------------
 | store
 | Este método guarda la información proveniente del formulario
 | Se seccionó en varias funciones para simplificar la inclusión o exclusión de las secciones
 |--------------------------------------------------------------------------
 */

 public function store(formularioPlantillaRequest $request)
    {     
        // Crear instancias de modelos
        $registroDatosPersonales = new RegistroDatosPersonales;
        $registroPersonaExtra = new RegistroPersonaExtra;
        $registroProyecto = new RegistroProyecto;
        $registroArchivos = new RegistroArchivos;
    
        // Llenar modelos con datos de la solicitud
        $registroIdFolio = $this->DatosPersonales($request, $registroDatosPersonales);
        $registroId = $registroIdFolio['registroId'];
        $folio = $registroIdFolio['folio'];       
        $this->PersonaExtra($request, $registroPersonaExtra, $registroId);
        $this->Proyecto($request, $registroProyecto, $registroId);
        $this->Archivos($request, $registroArchivos, $registroId, $folio);
    
        // Crear usuario y asignar rol
        $this->crearUsuarioYAsignarRol($registroDatosPersonales);
        $mensaje = 'Ha sido registrado con el folio' . $request->folio;

        $correo = $this->enviarcorreo($registroDatosPersonales, $request->input('origen'));
    
        // Se redirecciona con el número de folio
        return redirect()->route('registrado', ['folio' => $registroDatosPersonales->folio]);
        
    }
 
 
 // Métodos privados
    private function DatosPersonales(formularioPlantillaRequest $request, RegistroDatosPersonales $registroDatosPersonales)
    {
        // Se llenan modelos con datos de la solicitud
        $registroDatosPersonales->fill($request->only([
            'nombres',
            'apellidoPaterno',
            'apellidoMaterno',
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
            'localidad',
            'email',
            'emailVerf',
            'telUno',
            'telDos',
        ]));

        // Asignar formato Y-m-d a la fecha de nacimiento para el guardado en la base de datos
        $fecha_nacimiento = Carbon::parse($registroDatosPersonales->fechaNacimiento);
        $registroDatosPersonales->fechaNacimiento = $fecha_nacimiento->format('Y-m-d');

        //Generar Folio (REG_PREFIJO debe ser cambiado por el prefijo que se prefiera usar)
        $generado = $this->generarFolio();
        $folio = 'REG_PREFIJO' . $generado;
        $registroDatosPersonales->folio = $folio;

        while (RegistroDatosPersonales::where('folio', '=', $folio)->exists()) {
            $generado = $this->generarOtroFolio();
            $otro = 'REG_PREFIJO' . $generado;
            $folio = $otro;
        }
        $registroDatosPersonales->folio = $folio;


        // Generar usuarioTemporal
        $adicional = $this->generarUsuarioTemporal();
        $usuarioTemporal = $registroDatosPersonales->folio . $adicional;
        $registroDatosPersonales->usuarioTemporal = $usuarioTemporal;

        // Generar contraseña
        $contrasenia = $this->generarContrasenia();
        $registroDatosPersonales->contrasenia = bcrypt($contrasenia);


        // Generar el path para los archivos.
        $path = '/public/' . $registroDatosPersonales->folio;

        // Guardar instancia en la base de datos
        $registroDatosPersonales->save();

        // Obtener el ID de registroDatosPersonales para usar en otras tablas
        $registroId = $registroDatosPersonales->id;

        // Devolver el ID y folio para su uso en otras funciones
        return ['registroId' => $registroId, 'folio' => $folio];
    }
   
    private function PersonaExtra(formularioPlantillaRequest $request, RegistroPersonaExtra $registroPersonaExtra, $registroId)
    {       
        // Llenar modelo con datos de la solicitud
        $registroPersonaExtra->fill($request->only([
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
        ]));
    
        // Asignar el ID de registroDatosPersonales
        $registroPersonaExtra->id_registro = $registroId;
    
        // Guardar instancia en la base de datos
        $registroPersonaExtra->save();       
    }

    private function Proyecto(formularioPlantillaRequest $request, RegistroProyecto $registroProyecto, $registroId)
    {
        // Llenar modelo con datos de la solicitud
        $registroProyecto->fill($request->only([
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
            'localidad',
        ]));
    
        // Asignar el ID de registroDatosPersonales
        $registroProyecto->id_registro = $registroId;
    
        // Guardar instancia en la base de datos
        $registroProyecto->save();    
        
    }  

    private function Archivos(formularioPlantillaRequest $request, RegistroArchivos $registroArchivos, $registroId, $folio)
    {
         // Llenar modelo con datos de la solicitud
         $registroArchivos->fill($request->only([
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
        ]));
    
        // Asignar el ID de registroDatosPersonales
        $registroArchivos->id_registro = $registroId;
    
        // Ruta base para almacenar archivos
        $path = '/public/registros/' . $folio;
    
        // Procesar archivos PDF
        $this->procesarArchivo($request, 'pdf_1', $registroArchivos, $folio, $path);
        $this->procesarArchivo($request, 'pdf_2', $registroArchivos, $folio, $path);
        $this->procesarArchivo($request, 'pdf_3', $registroArchivos, $folio, $path);
        $this->procesarArchivo($request, 'pdf_4', $registroArchivos, $folio, $path);
    
        // Procesar archivos de imagen
        $this->procesarArchivo($request, 'img_1', $registroArchivos, $folio, $path);
        $this->procesarArchivo($request, 'img_2', $registroArchivos, $folio, $path);
        $this->procesarArchivo($request, 'img_3', $registroArchivos, $folio, $path);
        $this->procesarArchivo($request, 'img_4', $registroArchivos, $folio, $path);
    
        // Procesar archivos genéricos
        $this->procesarArchivo($request, 'archivo_1', $registroArchivos, $folio, $path);
        $this->procesarArchivo($request, 'archivo_2', $registroArchivos, $folio, $path);
    
        // Guardar instancia en la base de datos
        $registroArchivos->save();       
    }
    
    private function procesarArchivo(formularioPlantillaRequest $request, $nombreCampo, RegistroArchivos $registroArchivos, $folio, $path)
    {
        if ($request->hasFile($nombreCampo) && $request->file($nombreCampo)->isValid()) {
            $extension = $request->file($nombreCampo)->getClientOriginalExtension();
    
            // Definir el nombre del archivo basado en el tipo y el folio
            $nombreArchivo = $folio . '_' . $nombreCampo . '.' . $extension;
    
            // Asignar la ruta en la base de datos
            $registroArchivos->$nombreCampo = $folio . '/' . $nombreArchivo;
    
            // Almacenar el archivo en el directorio
            $archivo = $request->file($nombreCampo)->storeAs($path, $nombreArchivo);
        }
    }
    
    private function crearUsuarioYAsignarRol(RegistroDatosPersonales $registroDatosPersonales)
    {
        // Crear usuario
        $usuario = new User;
        $usuario->username = $registroDatosPersonales->usuarioTemporal;
        $usuario->name = $registroDatosPersonales->usuarioTemporal;
        $usuario->password = $registroDatosPersonales->contrasenia;
        $usuario->id_registro = $registroDatosPersonales->id;
        $usuario->save();

        // Asignar RolAsignado
        $rolAsignado = new RolAsignado;
        $rolAsignado->id_usuario = $usuario->id;
        $rolAsignado->id_rol = 5; // Ajustar el ID de rol según tus necesidades
        $rolAsignado->save();
    }

    

/*
 |--------------------------------------------------------------------------
 | registrado
 | Realiza una consulta en la base de datos utilizando el modelo `RegistroDatosPersonales` 
 | Se retorna la vista 'home.plantillaRegistrado', pasando como datos a la vista un array asociativo que contiene el objeto `$folio`.
 |--------------------------------------------------------------------------
 */

    public function registrado(RegistroDatosPersonales $folio)
    {
        $res = RegistroDatosPersonales::where('folio', '=', $folio->folio);
        return view('home.plantillaRegistrado', [
            'folio' => $folio,
             
        ]);
        
    }
    
   


    public function show(RegistroDatosPersonales $registroDatosPersonales)
    {
        return view('plantilla.ver',  [
            'registroDatosPersonales' => $registroDatosPersonales,    
 
        ]);
    }


    public function edit(RegistroDatosPersonales $registroDatosPersonales)
    {
  
        if (auth()->user()->hasRoles([5])) {
            return view('plantilla.edit', [
                'registroDatosPersonales' => $registroDatosPersonales,    


            ]);
        } else {
            return abort(401, 'Usted no puede editar este registro');
        }
    }


    public function update(registro $registro, editFormularioRequest $request)
    {
        $fecha_nacimiento = Carbon::parse($request->fechaNacimiento);
        $request->fechaNacimiento = $fecha_nacimiento->format('Y-m-d');
        $req = $request->except(['documentosPersonales', 'adjuntarProyecto']);

        $registro->update($req);
        $folio = $registro->folio;
        $path = '/public/' . $folio;

        if ($request->hasFile('documentosPersonales')) {
            File::delete('public/storage/' . $folio . $registro->documentosPersonales);
            // Guardar "documentos personales."
            $docPerNombre = $folio . '_documentos_personales.pdf';
            $documentosPersonales = $request->file('documentosPersonales')->storeAS($path, $docPerNombre);
            $registro->documentosPersonales = $folio . '/' . $docPerNombre;
            $registro->update(['documentosPersonales']);
        }
        if ($request->hasFile('adjuntarProyecto')) {
            File::delete('public/storage/' . $folio . $registro->adjuntarProyecto);
            $proyectoNombre = $folio . '_proyecto_adjunto.pdf';
            $adjuntarProyecto = $request->file('adjuntarProyecto')->storeAS($path, $proyectoNombre);
            $registro->adjuntarProyecto = $folio . '/' . $proyectoNombre;
            $registro->update(['adjuntarProyecto']);
        }
        $registroId = $registro->id;
        return redirect()->route('xix.show', $folio);
    }

/*

*/
    public function preguntasFrecuentes()
    {
        $preguntasFrecuentes = PreguntaFrecuente::where('status', '=', 1)->get();
        
        return view('preguntasFrecuentes.lista', [
            'preguntasFrecuentes' => $preguntasFrecuentes,
        ]);
    }

    public function contacto()
    {
        $contacto = Contactos::where('status', '=', 1)->get();
        return view('contacto.lista', [
            'contacto' => $contacto,
        ]);
    }


}
