@extends('admin.layout')
@section('content')



  <div class="panel panel-default">
    <div class="panel-heading">
      <h2>Listado de registros.</h2>      
    </div>
    <div class="table-responsive">
      <table id="registro"  data-order='[[ 1, "asc" ]]' class="table display responsive dt-responsive nowrap" style="width:100%">
        <thead>
          <tr>         
            <th>Folio</th>
            <th>Fecha de registro</th>
            <th>Nombre completo</th>
            <th>Nacionalidad </th>
            <th>CURP </th>
            <th>Género </th>
            <th>Seudónimo </th>
            <th>Calle </th>
            <th>Número </th>
            <th>C.P. </th>
            <th>Estado </th>
            <th>Municipio </th>
            <th>Localidad </th>
            <th>Correo institucional</th>          
            <th>Tel. institucional</th>
            <th>Cel.</th>
            <!--======= DATOS DEL PROYECTO =======-->
            <!--
            <th>Nombre del proyecto</th>
            <th>Tipo de participacion</th>
            <th>Número de integrantes</th>
            <th>Categoria del proyecto</th>
            <th>Etapa del proyecto</th>
            <th>Semblanza</th>
            <th>Duración</th>
            <th>Justificacion 1</th>
            <th>Justificacion 2 </th>
            <th>Justificacion 3</th>
            <th>Calle</th>
            <th>Número </th>
            <th>C.P. </th>
            <th>Estado </th>
            <th>Municipio </th> 
            <th>Localidad </th>
-->
            
             
            <!--======= DATOS DE PERSONA EXTRA =======-->
<!--
            <th>Nombre de la persona extra</th>   
            <th>Nacionalidad</th> 
            <th>CURP</th> 
            <th>Género</th> 
            <th>Seudónimo</th> 
            <th>email</th>
            <th>Teléfono</th> 
            <th>Celular</th> 
            <th>Semblanza</th> 
-->
            <!--======= ARCHIVO =======-->
            <!--<th>PDF 1</th>
            <th>PDF 2</th>
            <th>PDF 3</th>
            <th>PDF 4</th>
            <th>Imagen 1</th>
            <th>Imagen 2</th>
            <th>Imagen 3</th>
            <th>Imagen 4</th>
            <th>Archivo 1</th>
            <th>Archivo 2</th>-->
    
         
            <th>Ficha de registro</th>
            
          </tr>
        </thead>
        <tbody>

          @foreach($registros as $registro)


{{--INFORMACIÓN POR REGISTRO--}}

          <tr class="{{$registro->verificacion==1 ? 'registroAceptado' : ($registro->verificacion==2 ? 'registroRechazado':'registroPendiente')}}">
            <!--FOLIO-->
            <td> <a data-placement="top" title="Ver registro" class="" href="{{route('p_n.show',$registro->folio)}}"><i class="fas fa-folder"></i></a> RE_DGTIC00{!! $registro->id !!}</td>
            <!-- Fecha de inscripción-->
            <td>{{$registro->created_at}}</td>
           <!-- Nombre-->            
            <td>{!! $registro->nombres !!} {!! $registro->apellidoPaterno !!} {!! $registro->apellidoMaterno !!}</td>
            <!-- NACIONALIDAD -->
            <td>{!! $registro->nacionalidad->gentilicio_nac !!}</td>
            <!-- curp -->
            <td>{!! $registro->curp !!}</td>      
            <!-- GÉNERO -->
            <td>{!! $registro->idGenero ->genero !!}</td>  
            <!-- SEUDÓNIMO -->
            <td>{!! $registro->seudonimo !!}</td> 
            <!-- CALLE -->
            <td>{!! $registro -> calleResidencia !!}</td> 
            <!-- NÚMERO -->
            <td>{!! $registro->numeroResidencia !!}</td>    
            <!-- C.P. -->
            <td>{!! $registro->cpResidencia!!}</td> 
            <!-- ESTADO -->
            <td>{!! $registro->estado -> nombre !!}</td> 
            <!-- MUNICIPIO -->
            <td>{!! $registro->municipio -> nombre !!}</td> 
            <!-- LOCALIDAD -->
            <td>{!! $registro->localidad !!}</td>     
            <!-- EMAIL-->  
            <td>{!! $registro->email !!}</td>              
            <!-- TELÉFONO-->  
            <td>{!! $registro->telUno !!} <b>Ext.</b>{!! $registro->ext !!}</td>
            <!-- CELULAR-->  
            <td>{!! $registro->telDos !!}</td>
            <!--NOMBRE DE PERSONA EXTRA-->
            <!--<td>{!! $registro->personaExtra->pe_nombres !!}</td> -->
            
            
            <td class="acciones-btns">
              <a data-placement="top" title="Ver registro" class="" href="{{route('p_n.show',$registro->folio)}}"><i class="fas fa-folder"></i></a>
              
            </td>
       
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    {{-- $registros->links() --}}
  </div>

<!-- Modal  verificar -->
@foreach($registros as $r)

<div class="modal fade" id="{{'verificar'.$r->folio}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <p class="modal-title" id="staticBackdropLabel"><strong>Folio:</strong> {{$r->folio}}</p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {!! Form::model($registro, ['method' => 'PATCH', 'route' => ['admin.verificarRegistro', $r->folio]]) !!}
        <p> ¿Está seguro que desea verificar el registro con el folio {{'"'.$r->folio.'"'}}</p>
        <div class="text-right mt-3">
          <button class="btn btn-success btn-generico">Sí, verificar</button>
          <button type="button" class="btn btn-secondary btn-generico" data-dismiss="modal">Cerrar</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="{{'noAceptado'.$r->folio}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <p class="modal-title" id="staticBackdropLabel"><strong>Folio:</strong> {{$r->folio}}</p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        {!! Form::model($registro, ['method' => 'PATCH', 'route' => ['admin.noAceptadoRegistro', $r->folio]]) !!}
        <p> ¿Está seguro que desea no aceptar el registro con el folio {{'"'.$r->folio.'"'}}</p>

        <div id="selectboxx" data-id="{{$r->folio}}">
        <label>Motivo:</label>
        <select class="form-control z" id="motivo" name="motivo" required>
          <option value="">-- Seleccione --</option>
          <option value="Documentación incompleta">Documentación incompleta</option>
          <option value="Inconsistencias en la información">Inconsistencias en la información</option>
          <option value="Otro">Otro</option>
        </select>
        </div>
        <div id="div_otro_motivo{{$r->folio}}" class="form-group mt-3" style="display:none">
        <label>Otro motivo:</label>
        <textarea class="form-control" name="otro_motivo" id="otro_motivo" placeholder="Describa porque motivo">
        </textarea>
        </div>
        <div class="text-right mt-3">
          <button class="btn btn-verificacion">No aceptado</button>
          <button type="button" class="btn btn-secondary btn-generico" data-dismiss="modal">Cerrar</button>
        </div>
        </form>
      </div>
    </div>
  </div>

</div>


<div class="modal fade" id="{{'reversar'.$r->folio}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <p class="modal-title" id="staticBackdropLabel"><strong>Folio:</strong> {{$r->folio}}</p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {!! Form::model($registro, ['method' => 'PATCH', 'route' => ['admin.reversarRegistro', $r->folio]]) !!}
        <p> ¿Está seguro que desea reactivar para nueva revisión {{'"'.$r->folio.'"'}}</p>
        <div class="text-right mt-3">
          <button class="btn btn-success btn-generico">Sí, reactivar</button>
          <button type="button" class="btn btn-secondary btn-generico" data-dismiss="modal">Cerrar</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endforeach
{{-- Termina modal de verificar --}}
@stop
