@extends('partials.layout_cms')
@extends('admin.header')
@section('content')

<div class="ver-registro mb-5">

  <div class="row">
    <div class="col-md-8 order">
      <h3>Folio de registro: <span> REG_PREFIJO{{$registroDatosPersonales->id}}</span></h3>
    </div>
    <div class="col-md-4 order1">@if(auth()->user()->hasRoles([1]))
      <a class="dt-button buttons-print col-md" style="display: block; width:70%; text-align:center" href="{{ url('dominio-url/admin/lista-registros') }}">Regresar a lista de registros</a>
      @endif
    </div>

  </div>

  <div class="col-md-12 ">
    <h2>Datos del participante</h2>
  </div>

  <table class="table table-hover">
        <tbody>
          <tr>
            <th scope="row">Nombre completo</th>
            <td>{{$registroDatosPersonales->nombres}} {{$registroDatosPersonales->pe_aPaterno}} {{$registroDatosPersonales->aMaterno}}</td>
          </tr>

          <tr>
            <th scope="row">Correo electrónico</th>
            <td>{{$registroDatosPersonales->email}}</td>
          </tr>

          <tr>
            <th scope="row">Teléfono(s)</th>
            <td colspan="2">{{$registroDatosPersonales->telUno}}  
    
              @isset($registroDatosPersonales->telDos) <b>Cel.</b> {{$registroDatosPersonales->telDos}} @endisset 


            </td>
          </tr>


        </tbody>
      </table>
  <div class="row">


  </div>
</div>



</div>

@stop