@extends('layouts.app')
@section('content')
    {{Form::open(['route'=>['jogos.update',$jogo->id],'method' => 'PUT'])}}

        pontos de {{$jogo->time1r->nome}}
        {{Form::number('t1pontos',0,['class'=>'form-control','required'])}}

        pontos de {{$jogo->time2r->nome}}
        {{Form::number('t2pontos',0,['class'=>'form-control','required'])}}

        {{Form::submit('Enviar',['class'=>'btn btn-info'])}}
        <a class="btn btn-secondary" href="/jogos">Voltar</a>

    {{Form::close()}}
@endsection