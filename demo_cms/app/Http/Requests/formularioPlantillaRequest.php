<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class formularioPlantillaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // Autoriza el acceso al form request. Si retorna "false" devolverá un error del tipo forbidden.
    public function authorize()
    {
        return true;
    }

    // Define las reglas de validación que se aplicarán a la solicitud.
    public function rules()
    {
        return [
        //Datos personales
            'nombres'               =>      'required|string',
           
            'curp'                  =>      'required|string|size:18',
            'cpResidencia'          =>      'required|numeric|digits:5',
            'email'                 =>      'required|email|unique:registro_datosPersonales',
            'emailVerf'             =>      'required|email|same:email',
            'telUno'                =>      'required|numeric|digits:10',
            'telDos'                =>      'required|numeric|digits:10',
        //Datos de persona extra
            'pe_curp'                  =>      'required|string|size:18',
            'pe_email'                 =>      'required|email|unique:registro_personaExtra',
            'pe_emailVerf'             =>      'required|email|same:pe_email',
            'pe_telUno'                =>      'required|numeric|min:10',
            'pe_telDos'                =>      'required|numeric|min:10',
            'pe_semblanza'             =>      'required|string',
        //Datos proyecto
                 
        ];
    }



    // Esta función es la encargada de enviar los mensajes de error.
    public function messages()
    {
        return [
            // Mensajes de campos obligatorios.

             'nombres.required'                 =>  'El campo nombre es un campo obligatorio.',
             'apellidoPaterno.required'         =>  'El campo apellido paterno es un campo obligatorio.',
             'apellidoMaterno.required'         =>  'El campo apellido materno es un campo obligatorio.',
             'fechaNacimiento.required'         =>  'El campo fecha de nacimiento es un campo obligatorio',
             'idNacionalidad.required'          =>  'El campo nacionalidad es un campo obigatorio',
             'curp.required'                             =>  'El campo CURP es un campo obligatorio',
             'genero.required'                           =>  'El campo género es un campo obligatorio',
             'seudonimo.required'                        =>  'El campo seudonimo es un campo obligatorio',
             'adicional_1.required'                      =>  'El campo [campo adicional] es un campo obligatorio',
             'calleResidencia.required'                  =>  'El campo calle es un campo obligatorio',
             'numeroResidencia.required'                 =>  'El campo número es un campo obligatorio',
             'cpResidencia.required'                     =>  'El campo C.P. es un campo obligatorio',
             'idEstado.required'                         =>  'El campo estado es un campo obligatorio',
             'idMunicipio.required'                      =>  'El campo municipio es un campo obligatorio',
             'localidad.required'                        =>  'El campo localidad es un campo obligatorio',
             'email.required'                   =>  ':attribute es un campo obligatorio.',
             'emailVerf.required'               =>  ':attribute es un campo obligatorio.',
             'email.email'                      =>  ':attribute debe ser un correo electrónico.',
             'emailVerf.email'                  =>  ':attribute debe ser un correo electrónico.',
             'emailVerf.same'                   =>  ':attribute debe ser igual al correo electrónico.',
             'email.unique'                     =>  'Este correo ya fue registrado, por favor intente con otro.',
             'telUno.required'                 =>  'El campo teléfono es un campo obligatorio',       
             'telDos.required'                 =>  'El campo teléfono móvil es un campo obligatorio',
        //Datos de persona extra
            'pe_nombres.required'               =>      'El campo nombre es un campo obligatorio.',
            'pe_apellidoPaterno.required'       =>      'El campo apellido paterno es un campo obligatorio.',
            'pe_apellidoMaterno.required'       =>      'El campo apellido materno es un campo obligatorio.',
            'pe_idNacionalidad.required'        =>      'El campo nacionalidad es un campo obigatorio',
            'pe_curp.required'                  =>      'El campo CURP es un campo obligatorio',
            'pe_genero.required'                =>      'El campo género es un campo obligatorio',   
            'pe_email.required'        =>      ':attribute es un campo obligatorio.',
            'pe_emailVerf.required'    =>      ':attribute es un campo obligatorio.',
            'pe_email.email'           =>      ':attribute debe ser un correo electrónico.',
            'pe_emailVerf.email'       =>      ':attribute debe ser un correo electrónico.',
            'pe_emailVerf.same'        =>      ':attribute debe ser igual al correo electrónico.',
            'pe_email.unique'          =>      'Este correo ya fue registrado, por favor intente con otro.',
            'pe_telUno.required'       =>      'El campo teléfono es un campo obligatorio',       
            'pe_telDos.required'       =>      'El campo teléfono móvil es un campo obligatorio',
            'pe_semblanza'             =>      'El campo semblanza móvil es un campo obligatori',
        //Datos proyecto
            'nombreProyecto'        =>      'Es un campo obligatorio.',
            'participacion'         =>      'Es un campo obligatorio.',
            'integrantes'           =>      'Es un campo obligatorio.',
            'catProyecto'           =>      'Es un campo obligatorio.',
            'catEtapa'              =>      'Es un campo obligatorio.',
            'semblanza'             =>      'Es un campo obligatorio.',
            'catDuracion'           =>      'Es un campo obligatorio.',
            'justificacion_1'       =>      'Es un campo obligatorio.',
            'justificacion_2'       =>      'Es un campo obligatorio.',
            'justificacion_3'       =>      'Es un campo obligatorio.',
            'pr_adicional_1'        =>      'Es un campo obligatorio.',
                        
        ];
    }
    
    // Esta función especifica cómo se llamarán los campos a la hora de enviar un mensaje de error, son invocados por la función "messages" como :attribute.
    public function attributes()
    {
        return [
      
            'nombres'           =>      'El nombre',
            'apellidoPaterno'   =>      'El apellido paterno',
            'apellidoMaterno'   =>      'El apellido materno',
            'email'             =>      'El correo electrónico',
            'emailVerf'         =>      'La confirmación del correo electrónico',
            'telUno'           =>      'El telefono',
            'telUno'           =>      'La extensión',
            'telDos'           =>      'El telefono movil',

        ];
    }
}
