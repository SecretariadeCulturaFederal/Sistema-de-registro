@extends('admin.layout')
@section('content')
<div class="container col-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>Listado de registros verificados</h2>
        </div>
        <table id="verificado" class="table table-striped table-bordered dt-responsive nowrap">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Fecha y hora de registro</th>
                    <th>Folio</th>
                    <th>Texto lengua I. mexicana</th>
                    <th>Texto en español</th>
                    <th>Identificación oficial</th>
                    <th>Hoja de datos</th>
                    <th>Audio .mp3</th>
                    <th>Audio .wav</th>
                    <th>Imagen .jpg</th>
                    <th>Ficha de registro</th>
                    <th>Nombre artístico</th>
                    <th>Género</th>
                    <th>Edad</th>
                    <th>Lugar de residencia</th>
                    <th>Correo electrónico</th>
                    <th>Teléfono(s)</th>
                   
                </tr>
            </thead>
            <tbody>
                @foreach($registros as $registro)
                <tr>
                    <td>{!! $registro->id !!}</td>
                    <td>{{$registro->created_at}}</td>
                    <td>{!! $registro->folio !!}</td>

                    <!-- Obligatorio -->

                    <td><a href="{{asset('storage/app/public/'.$registro->texto_lm)}}" target="_blank">{{asset('storage/app/public/'.$registro->texto_lm)}}</a></td>

                    <td><a href="{{asset('storage/app/public/'.$registro->texto_es)}}" target="_blank">{{asset('storage/app/public/'.$registro->texto_es)}}</a></td>


                    <td><a href="{{asset('storage/app/public/'.$registro->ident_vi)}}" target="_blank">{{asset('storage/app/public/'.$registro->ident_vi)}}</a></td>


                    <td><a href="{{asset('storage/app/public/'.$registro->hoja_datos)}}" target="_blank">{{asset('storage/app/public/'.$registro->hoja_datos)}}</a></td>


                    <!-- Opcionales -->


                    <td> 
                      @if($registro->a_mptres=='audio_mp3_vacio')  
                        (El participante no adjuntó el archivo especificado) 
                      @elseif($registro->a_mptres=$registro->folio) 
                          <a href="{{asset('storage/app/public/'.$registro->a_mptres)}}" target="_blank">{{asset('storage/app/public/'.$registro->a_mptres)}}</a> 
                      @endif
                    </td>
            
                    <td>

                      @if($registro->a_wav=='audio_wav_vacio')   
                        (El participante no adjuntó el archivo especificado)
                      @elseif($registro->a_wav=$registro->folio) 
                      <a href="{{asset('storage/app/public/'.$registro->a_wav)}}" target="_blank">{{asset('storage/app/public/'.$registro->a_wav)}}</a>
                      @endif
                    </td>


                    <td>
                      @if($registro->a_jpg=='imagen_jpg_vacia')
                            (El participante no adjuntó el archivo especificado)
                      @elseif($registro->a_jpg=$registro->folio) 
                      <a href="{{asset('storage/app/public/'.$registro->a_jpg)}}" target="_blank">{{asset('storage/app/public/'.$registro->a_jpg)}}</a>
                      @endif
                    </td>
                   

                    <td class="acciones-btns">
                        <a data-toggle="tooltip" data-placement="top" title="Ver registro" class="" href="{{route('p_n.show',$registro->folio)}}"><i class="fas fa-folder"></i></a>
                    </td>

                
                    <td>{{$registro->seudonimo}}</td>
                    <td>{{$registro->sexo}}</td>
                    <td> {{\Carbon\Carbon::parse(($registro->f_nacimiento))->age}} años</td>
                  
                   
                    <td>{{$registro->municipio}}, {{$registro->estado}},  {{$registro->localidad_a}}</td>
            
                    <td>{{$registro->email}}</td>
                    <td>{{$registro->tel_uno}} @isset($registro->tel_dos)/ Tel 2: {{$registro->tel_dos}} @endisset</td>
                   
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $registros->links()}}
    </div>
</div>
@stop