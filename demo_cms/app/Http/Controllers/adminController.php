<?php

namespace App\Http\Controllers;

use File;
use Carbon\Carbon;
use App\Http\Controllers\crearContacto;
use App\Http\Requests\crearContactoRequest;
use App\Http\Requests\crearPrensaRequest;
use App\Http\Requests\faqRequest;
use App\Http\Requests\editContactoRequest;
use App\Http\Requests\editFaqRequest;
use App\Http\Requests\editPrensaRequest;
use App\Contactos;
use App\convocatorias;
use App\Http\Requests\crearRolFormularioRequest;
use App\Http\Requests\crearUsuarioRequest;
use App\Http\Requests\editarRolFormularioRequest;
use App\Http\Requests\editUsuarioRequest;
use App\preguntasFrecuentes;
use App\prensa;
use App\registro;
use App\rol;
use App\Colecciones;
use App\rolesAsignados;
use App\User;
use App\Actividad;
use App\Asistencia;
use App\Sistema;
use App\RegistroDatosPersonales;
use App\RegistroPersonaExtra;
use App\RegistroProyecto;
use App\RegistroArchivos;

use App\Http\Requests\crearActividadRequest;
use Illuminate\Support\Facades\Auth;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class adminController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Métodos en relacion a la administración de los registros
    | Aqui va la descripcion de esta sección
    |--------------------------------------------------------------------------
    */

     
    public function listaRegistros($bienal = false)
    {
        if (!$bienal) {
            $bienal = 'REG_PREFIJO';
        }

        $registros = RegistroDatosPersonales::with(['nacionalidad', 'idGenero', 'archivos', 'proyectos', 'personaExtra'])
        ->where("registro_datosPersonales.folio", 'like', $bienal . "%")
        ->orderBy('registro_datosPersonales.id', 'ASC')
        ->paginate(2000);
    
        return view('admin.listadoRegistro')
            ->with('registros', $registros);
    }


    public function listaRegistrosMod($bienal = false)
     {
         if (!$bienal) $bienal = 'REG_DGTIC';
         $registro = RegistroDatosPersonales::select(
             "registro.*",
             "unidades_administrativas.id_adm",
             "unidades_administrativas.titulo as t_uni",
             "ua_areas.id as ua_area_id", // Alias para el id de ua_areas
             "ua_areas.titulo as t_area"
         )
             ->where("registro.folio", 'like', $bienal . "%")
             ->where(function ($query) {
                 $query->whereNull("registro.formulario")
                     ->orWhere("registro.formulario", "extemporaneo");
             })
             ->leftJoin("unidades_administrativas", "unidades_administrativas.id_adm", "=", "registro.u_administrativa")
             ->leftJoin("ua_areas", "ua_areas.id", "=", "registro.ua_areas")
             ->orderBy('registro.id', 'ASC')
             ->paginate(2000);
         $numRegistrosExt = RegistroDatosPersonales::where("formulario", "extemporaneo")->count();
         $numRegistrosPresencial = RegistroDatosPersonales::whereNull("formulario")->count();
     
         $asistencia = $this->mostrarVista();
         $asistenciaDia = [];
         $diasSemana = ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes'];
         
         foreach ($diasSemana as $dia) {
             $asistenciaDia[$dia] = Asistencia::where($dia, 1)->count();
         }
         
        

     
         return view('admin.listadoRegistroMod')
             ->with('registros', $registro)
             ->with('asistencia', $asistencia)
             ->with('diasSemana', $diasSemana)
             ->with('asistenciaDia', $asistenciaDia)
             ->with('numRegistrosExt', $numRegistrosExt)
             ->with('numRegistrosPresencial', $numRegistrosPresencial);
     }    
    public function guardarAsistencia(Request $request)
    {
        $registroId = $request->input('registro_id');


    
        // Obtener el registro de asistencia por el ID del registro
        $asistencia = Asistencia::updateOrInsert(
            ['id_registro' => $registroId],
            [
                'lunes' => $request->lunes ? '1' : '0',
                'martes' => $request->martes ? '1' : '0',
                'miercoles' => $request->miercoles ? '1' : '0',
                'jueves' => $request->jueves ? '1' : '0',
                'viernes' => $request->viernes ? '1' : '0',
            ]
        );
    
        return redirect()->route('admin.listaRegistros'); 
    }
    public function mostrarVista()
    {
        // Recupera la información de la tabla "registros"
        $registros = RegistroDatosPersonales::all(); // Esto recuperará todos los registros de tus usuarios
        
        // Crea un arreglo asociativo para almacenar la información de asistencia por usuario
        $asistencia = [];
        
        // Itera a través de los registros y recupera la información de asistencia
        foreach ($registros as $registro) {
            $id_registro = $registro->id; // Obtén el ID del registro actual
    
            // Recupera la información de asistencia para el usuario actual usando el ID de registro
            $asistencia[$id_registro] = Asistencia::where('id_registro', $id_registro)->first();
    
            if (!$asistencia[$id_registro]) {
                // Si no hay información de asistencia para este usuario, establece todos los días en 0
                $asistencia[$id_registro] = [
                    'lunes' => 0,
                    'martes' => 0,
                    'miercoles' => 0,
                    'jueves' => 0,
                    'viernes' => 0,
                ];
            }
        }
    
        // Pasa los datos a la vista
        return $asistencia;
    }
    
    
    

    

 public function index()
{
    if (auth()->user()->hasRoles([5])) {
        $registro = RegistroDatosPersonales::find(auth()->user()->id_registro);
        $folio = $registro->folio;
        return redirect()->route('cam.show', $folio);
    }

    if (auth()->user()->hasRoles([1, 2, 3])) {
        return redirect()->route('admin.listaRegistros');
    }

    if (auth()->user()->hasRoles([6])) {
        return redirect()->route('admin.listaVerificados');
    }

    if (auth()->user()->hasRoles([4])) {
        return redirect()->route('admin.listaPrensa');
    }

    // Agrega más condiciones según sea necesario

    // Si ninguna condición coincide, puedes redirigir a una ruta predeterminada
    //return redirect()->route('default.route');
}

    public function random($longitud = 8)
    {
        $caracteres = 'abcdfghijklmnopqrstuvwxyz';
        return substr(str_shuffle($caracteres), 0, $longitud);
    }


/*
 |--------------------------------------------------------------------------
 | Métodos en relacion a los contactos
 | Aqui va la descripcion de esta sección
 |--------------------------------------------------------------------------
 */
    public function crearContacto()
    {

        return view('admin.crearContacto', [
            'contacto' => new contacto,
        ]);
    }
    public function guardarContacto(crearContactoRequest $request)
    {
        $contacto = new contacto;
        $contacto->fill($request->all());
        // Generar el slug
        $nom_sin_esp = str_replace(' ', '-', $request->nombre);
        // $resultado =preg_replace("/[^0-9]/", "", $nom_sin_esp);
        $random = $this->random();
        $slug = $random . $nom_sin_esp;
        $contacto->slug = $slug;
        // guardar, mostrar error en pantalla en caso de haber uno
        $contacto->save();
        $request->session()->regenerate();

        return redirect()->route('admin.listaContactos');
    }
    public function editarContacto(contacto $contacto)
    {
        return view('admin.editarContacto', [
            'contacto' => $contacto,
        ]);
    }
    public function actualizarContacto(contacto $contacto, editContactoRequest $request)
    {
        $validated = $request->validated();
        $contacto->update($validated);
        // Generar el slug
        $nom_sin_esp = str_replace(' ', '-', $request->nombre);
        // $resultado =preg_replace("/[^0-9]/", "", $nom_sin_esp);
        $random = $this->random();
        $slug = $random . $nom_sin_esp;
        $contacto->slug = $slug;
        $contacto->update(['slug']);
        return redirect()->route('admin.listaContactos');
    }
    public function listaContactos()
    {
        $contactos = contacto::paginate(10);
        return view('admin.listaContactos', [
            'contacto' => $contactos,
        ]);
    }
    public function deshabilitarContacto(contacto $contacto)
    {
        $contacto->status = 0;
        $contacto->update(['status']);
        return redirect()->route('admin.listaContactos');
    }
    public function habilitarContacto(contacto $contacto)
    {
        $contacto->status = 1;
        $contacto->update(['status']);
        return redirect()->route('admin.listaContactos');
    }



/*
 |--------------------------------------------------------------------------
 | Métodos dedicados a administrar los registros
 | Aqui va la descripcion del conjunto de métodos
 |--------------------------------------------------------------------------
 */
    public function verificarRegistro(registro $registro)
    {
        $id = Auth::id();
        $registro->verificacion = 1;
        $registro->verificacion_at = date('Y-m-d H:i:s');
        $registro->verificacion_by = $id;
        $registro->update(['verificacion']);
        return redirect()->route('admin.listaRegistros');
    }

    public function noAceptadoRegistro(registro $registro, request $request)
    {
        $registro = registro::findorfail($registro->id);
        $id = Auth::id();
        $registro->verificacion = 2;
        $registro->motivo = $request->motivo;
        $registro->otro_motivo = $request->otro_motivo;
        $registro->verificacion_at = date('Y-m-d H:i:s');
        $registro->verificacion_by = $id;
        $registro->update(['verificacion','motivo','otro_motivo', 'verificacion_at', 'verificacion_by']);
        return redirect()->route('admin.listaRegistros');
    }

    public function reversarRegistro(registro $registro)
    {
        $registro = registro::findorfail($registro->id);
        $id = Auth::id();
        $registro->verificacion = 0;
        $registro->motivo = "Reactivado para nueva revisión";
        $registro->otro_motivo = "";
        $registro->verificacion_at = date('Y-m-d H:i:s');
        $registro->verificacion_by = $id;
        $registro->update(['verificacion','motivo','otro_motivo', 'verificacion_at', 'verificacion_by']);
        return redirect()->route('admin.listaRegistros');
    }

    public function listaVerificados($bienal=false)
    {
        if(!$bienal) $bienal='REG_DGTIC';
        //$registros = registro::where('verificacion', '=', 1)->paginate(20);
        $registros = registro::select(
            "registro.*"

        )

            ->where("registro.folio",'like', $bienal."%")
            ->where('verificacion', '=', 1)
            ->orderBy('id', 'ASC')
            ->paginate(2000);
        return view('admin.verificados', [
            'registros' => $registros,
        ]);
    }


/*
 |--------------------------------------------------------------------------
 | Funciones dedicadas a administrar las preguntas frecuentes (faq)->[Frecuent Asked Questions]
 | Aqui va la descripcion del conjunto de métodos
 |--------------------------------------------------------------------------
 */
    public function crearfaq()
    {

        return view('admin.crearfaq', [
            'preguntasFrecuentes' => new preguntasFrecuentes,            
        ]);
    }
    public function guardarfaq(faqRequest $request)
    {
        $preguntasFrecuentes = new preguntasFrecuentes;
        $preguntasFrecuentes->fill($request->all());
        $pregunta = str_replace(' ', '-', $request->pregunta);
        $random = $this->random();
        $slug = $random . $pregunta; // Generar el slug
        $preguntasFrecuentes->slug = $slug;
        try {
            $preguntasFrecuentes->save();
            $request->session()->regenerate();
        } catch (\Illuminate\Database\QueryException $e) {
            ddd($e);
        }
        return redirect()->route('admin.listafaq');
    }
    public function listafaq()
    {
        $faq = preguntasFrecuentes::paginate(15);
        return view('admin.listafaq')->with('faq', $faq);
    }
    public function editarFaq(preguntasFrecuentes $preguntasFrecuentes)
    {
        $convocatorias = convocatorias::where('status', '=', 1)->get();
        return view('admin.editarFaq', [
            'preguntasFrecuentes' => $preguntasFrecuentes,
            'convocatorias' => $convocatorias,
        ]);
    }
    public function actualizarFaq(preguntasFrecuentes $preguntasFrecuentes, editFaqRequest $request)
    {
        $validated = $request->validated();
        $preguntasFrecuentes->update($validated);
        $pregunta = str_replace(' ', '-', $request->pregunta);
        $random = $this->random();
        $slug = $random . $pregunta; // Generar el slug
        $preguntasFrecuentes->update(['slug']);
        return redirect()->route('admin.listafaq');
    }
    public function deshabilitarFaq(preguntasFrecuentes $preguntasFrecuentes)
    {
        $preguntasFrecuentes->status = 0;
        $preguntasFrecuentes->update(['status']);
        return redirect()->route('admin.listafaq');
    }
    public function habilitarFaq(preguntasFrecuentes $preguntasFrecuentes)
    {
        $preguntasFrecuentes->status = 1;
        $preguntasFrecuentes->update(['status']);
        return redirect()->route('admin.listafaq');
    }


/*
 |--------------------------------------------------------------------------
 | Funciones dedicadas a administrar las el apartado de prensa
 | Aqui va la descripcion del conjunto de métodos
 |--------------------------------------------------------------------------
 */
    public function crearPrensa()
    {
        $prensa = new prensa;
        $fechaConT = str_replace(' ', 'T', Carbon::now());

        $prensa->fecha_publica = $fechaConT;

        return view('admin.crearPrensa', [
            'prensa' => $prensa,

        ]);
    }
    public function guardarPrensa(crearPrensaRequest $request)
    {
        $prensa = new prensa;
        $prensa->fill($request->all());
        $tituloSinEspacios = str_replace(' ', '-', $request->titulo);
        $random = $this->random();
        $slug = $random . $tituloSinEspacios;
        $prensa->slug = $slug;

        $fecha = $request->fecha_publica;
        $prensa->fecha_publica = str_replace('T', ' ', $fecha);
        $extension = $request->imagen->getclientoriginalextension();
        $nombreImagen = $tituloSinEspacios . $random . '.' . $extension;
        $path = '/public/prensas';
        $imagen = $request->file('imagen')->storeAS($path, $nombreImagen);
        $prensa->imagen = $nombreImagen;
        $id = Auth::id();
        $prensa->usuarios_id = $id;
        try {
            $prensa->save();
            $request->session()->regenerate();
        } catch (\Illuminate\Database\QueryException $e) {
            ddd($e);
        }
        return redirect()->route('admin.listaPrensa');
    }    public function listaPrensa()
    {
        $prensa = prensa::paginate(15);
        foreach ($prensa as $p) {
            $p->fecha_publica = str_replace('T', ' ', $p->fecha_publica);
        }
        return view('admin.listaPrensa', [
            'prensa' => $prensa,
        ]);
    }
    public function editarPrensa(prensa $prensa)
    {

        $prensa = prensa::findorfail($prensa->id);
        $id = $prensa->usuarios_id;
        $usuario = User::find($id);
        $nombre = $usuario->name;

        $fecha = $prensa->fecha_publica;
        $prensa->fecha_publica = str_replace(' ', 'T', $fecha);
        return view('admin.editarPrensa', [
            'prensa' => $prensa,
            'nombre' => $nombre,

        ]);
    }
    public function actualizarPrensa(prensa $prensa, editPrensaRequest $request)
    {
        $prensa = prensa::findorfail($prensa->id);
        $req = $request->except(['imagen']);
        $prensa->update($req);
        if ($request->hasFile('imagen')) {
            File::delete('public/storage/prensas/' . $prensa->imagen);
            $tituloSinEspacios = str_replace(' ', '-', $request->titulo);
            $random = $this->random();
            $extension = $request->imagen->getclientoriginalextension();
            $nombreImagen = $tituloSinEspacios . $random . '.' . $extension;
            $path = '/public/prensas';
            $imagen = $request->file('imagen')->storeAS($path, $nombreImagen);
            $prensa->imagen = $nombreImagen;
            $prensa->update(['imagen']);
        }
        $tituloSinEspacios = str_replace(' ', '-', $prensa->titulo);
        $random = $this->random();
        $slug = $random . $tituloSinEspacios;
        $prensa->slug = $slug;
        $prensa->update(['slug']);
        $fecha = $request->fecha_publica;
        $prensa->fecha_publica = str_replace('T', ' ', $fecha);
        $prensa->update(['fecha_publica']);
        $id = Auth::id();
        $prensa->usuarios_id = $id;
        $prensa->update(['usuarios_id']);

        return redirect()->route('admin.listaPrensa');
    }
    public function deshabilitarPrensa(prensa $prensa)
    {
        $prensa->status = 0;
        $prensa->update(['status']);
        return redirect()->route('admin.listaPrensa');
    }
    public function habilitarPrensa(prensa $prensa)
    {
        $prensa->status = 1;
        $prensa->update(['status']);
        return redirect()->route('admin.listaPrensa');
    }

/*
 |--------------------------------------------------------------------------
 | Funciones dedicadas a administrar los roles y usuarios
 | Aqui va la descripcion del conjunto de métodos
 |--------------------------------------------------------------------------
 */
    public function listarRoles()
    {
        $roles = rol::paginate(10);
        return view('admin.listarRoles', [
            'roles' => $roles,
        ]);
    }
    public function crearRol()
    {
        return view('admin.crearRol', [
            'rol' => new rol,
        ]);
    }
    public function guardarRol(crearRolFormularioRequest $request)
    {
        $roles = new rol;
        $roles->fill($request->all());
        //dd($request->all());
        $roles->rol = $request->rol;
        $roles->descripcion = $request->descripcion;

        try {
            $roles->save();
        } catch (\Illuminate\Database\QueryException $e) {
            dd($e);
        }

        $request->session()->regenerate();

        return redirect()->route('admin.listarRoles');
    }
    public function editarRol(rol $roles)
    {

        return view('admin.editarRol', [
            'rol' => $roles,
        ]);
    }
    public function actualizarRol(rol $roles, editarRolFormularioRequest $request)
    {

        $validated = $request->validated();
        $roles->where('id', '=', $roles->id)->update($validated);
        return redirect()->route('admin.listarRoles');
    }
    public function deshabilitarRol(rol $roles)
    {
        $roles->status = 0;
        $roles->update(['status']);
        return redirect()->route('admin.listarRoles');
    }
    public function habilitarRol(rol $roles)
    {
        $roles->status = 1;
        $roles->update(['status']);
        return redirect()->route('admin.listarRoles');
    }
    public function listarUsuarios()
    {
        $usuarios = User::paginate(10);
        return view('admin.listaUsuarios', [
            'usuarios' => $usuarios,
        ]);
    }
    public function CrearUsuario()
    {
        $roles = rol::where('status', '=', 1)->get();
        return view('admin.crearUsuario', [
            'usuario' => new User,
            'roles' => $roles,
        ]);
    }
    /**
     * guardarUsuario
     *
     * @param crearUsuarioRequest $request
     * @return void
     */
    public function guardarUsuario(crearUsuarioRequest $request)
    {

        $usuario = new User;
        $rolesAsignados = new rolesAsignados;
        $usuario->fill($request->except('roles'));
        $usuario->username = $usuario->name;
        $usuario->password = bcrypt($usuario->password);
        $rolesAsignados->fill($request->except('name', 'email', 'password', 'password_confirmation'));

        // Generar el slug
        //$nom_sin_esp = str_replace(' ', '-', $request->nombre);
        // $resultado =preg_replace("/[^0-9]/", "", $nom_sin_esp);
        //$random=$this->random();
        //$slug =$random.$nom_sin_esp;
        //$contacto->slug=$slug;
        // guardar, mostrar error en pantalla en caso de haber uno

        try {
            $usuario->save();
        } catch (\Illuminate\Database\QueryException $e) {
            dd($e);
        }

        $usuarioId = $usuario->id;
        $rolesAsignados->id_usuario = $usuarioId;
        for ($i = 0; $i < count($request->roles); $i++) {
            $rolesx[] = [
                'id_usuario' => $usuarioId,
                'id_rol' => $request->roles[$i]
            ];
        }
        try {
            rolesAsignados::insert($rolesx);
        } catch (\Illuminate\Database\QueryException $e) {
            dd($e);
        }
        $request->session()->regenerate();

        return redirect()->route('admin.listarUsuarios');
    }
    public function editarUsuario($id)
    {
        $usuarios = User::findorfail($id);
        //dd($usuarios->roles->id);
        $roles = rol::where('status', 1)->get();


        return view('admin.editarUsuario', [
            'usuario' => $usuarios,
            'roles' => $roles,
        ]);
    }
    public function actualizarUsuario($id, editUsuarioRequest $request)
    {

        $user = User::findorfail($id);
        if ($request->password == null) {
            $req = $request->except(['roles', 'password']);
        } else {
            $req = $request->except(['roles', 'password']);
            $user->password = bcrypt($request->password);
        }


        $user->update($req);
        if ($request->roles) {
            $rolesAsignados = rolesAsignados::where('id_usuario', '=', $id);
            $rolesAsignados->delete();
            for ($i = 0; $i < count($request->roles); $i++) {
                $rolesx[] = [
                    'id_usuario' => $id,
                    'id_rol' => $request->roles[$i]
                ];
            }
            try {
                rolesAsignados::insert($rolesx);
            } catch (\Illuminate\Database\QueryException $e) {
                dd($e);
            }
        }
        $request->session()->regenerate();
        return redirect()->route('admin.listarUsuarios');
    }

/*
 |--------------------------------------------------------------------------
 | Funciones dedicadas a administrar las actividades
 | Aqui va la descripcion del conjunto de métodos
 |--------------------------------------------------------------------------
 */
    public function listarActividades()
    {
        $actividades = actividades::paginate(10);
        return view('admin.listaActividades', [
            'actividades' => $actividades,
        ]);
    }
    public function crearActividad()
    {
        return view('admin.crearActividad', [
            'actividades' => new actividades,
        ]);
    }
    public function guardarActividad(crearActividadRequest $request)
    {
        $actividades = new actividades;
        $actividades->fill($request->all());
        $tituloSinEspacios = str_replace(' ', '-', $request->titulo);
        $random = $this->random();
        $slug = $random . $tituloSinEspacios;
        $actividades->slug = $slug;

        $fecha = $request->fecha_hora;
        $actividades->fecha_hora = str_replace('T', ' ', $fecha);
        $extension = $request->imagen->getclientoriginalextension();
        $nombreImagen = $tituloSinEspacios . $random . '.' . $extension;
        $path = '/public/actividades';
        $imagen = $request->file('imagen')->storeAS($path, $nombreImagen);
        $actividades->imagen = $nombreImagen;
        $id = Auth::id();
        $actividades->usuarios_id = $id;
        try {
            $actividades->save();
            $request->session()->regenerate();
        } catch (\Illuminate\Database\QueryException $e) {
            ddd($e);
        }
        return redirect()->route('admin.listarActividades');
    }
    public function editarActividad(actividades $actividades)
    {

        $actividades = actividades::findorfail($actividades->id);
        $id = $actividades->usuarios_id;
        $usuario = User::find($id);
        $nombre = $usuario->name;

        $fecha = $actividades->fecha_hora;
        $actividades->fecha_hora = str_replace(' ', 'T', $fecha);
        return view('admin.editarActividad', [
            'actividades' => $actividades,
            'nombre' => $nombre,

        ]);
    }
    public function actualizarActividad(actividades $actividades, editPrensaRequest $request)
    {
        $actividades = actividades::findorfail($actividades->id);
        $req = $request->except(['imagen']);
        $actividades->update($req);
        if ($request->hasFile('imagen')) {
            File::delete('public/storage/actividades/' . $actividades->imagen);
            $tituloSinEspacios = str_replace(' ', '-', $request->titulo);
            $random = $this->random();
            $extension = $request->imagen->getclientoriginalextension();
            $nombreImagen = $tituloSinEspacios . $random . '.' . $extension;
            $path = '/public/prensas';
            $imagen = $request->file('imagen')->storeAS($path, $nombreImagen);
            $actividades->imagen = $nombreImagen;
            $actividades->update(['imagen']);
        }
        $tituloSinEspacios = str_replace(' ', '-', $actividades->titulo);
        $random = $this->random();
        $slug = $random . $tituloSinEspacios;
        $actividades->slug = $slug;
        $actividades->update(['slug']);
        $fecha = $request->fecha_hora;
        $actividades->fecha_hora = str_replace('T', ' ', $fecha);
        $actividades->update(['fecha_hora']);
        $id = Auth::id();
        $actividades->usuarios_id = $id;
        $actividades->update(['usuarios_id']);

        return redirect()->route('admin.listarActividades');
    }
    public function deshabilitarActividad(actividades $actividades)
    {
        $actividades->status = 0;
        $actividades->update(['status']);
        return redirect()->route('admin.listarActividades');
    }
    public function habilitarActividad(actividades $actividades)
    {
        $actividades->status = 1;
        $actividades->update(['status']);
        return redirect()->route('admin.listarActividades');
    }
}
