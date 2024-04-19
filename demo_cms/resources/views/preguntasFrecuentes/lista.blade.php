@extends('partials.layout_plantilla')
@section('content')
    <title>Preguntas frecuentes</title>
    <div class="">
        <div class="container">
            <h1>Preguntas frecuentes</h1>
            <ul class="preguntas_frecuentes">
                @foreach ($preguntasFrecuentes as $pregunta)
                    <li>
                        <strong>{{ $pregunta->id }}</strong> - {{ $pregunta->pregunta }}
                        <ul>
                            <li>{{ $pregunta->respuesta }}</li>
                        </ul>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
