@extends('layouts.app')
@section('content')

    {{Form::open(['route' => ['campeonatos.update',$camp->id], 'method' => 'PUT'])}}

    nome:
    {{Form::text('nome',$camp->nome,['class'=>'form-control','required',
    'placeholder'=>'nome'])}}

    local:
    {{Form::text('local',$camp->local,['class'=>'form-control','required',
    'placeholder'=>'local'])}}

    {{Form::submit('Atualizar',['class'=>'btn btn-info'])}}
    <a class="btn btn-secondary" href="/campeonatos">Voltar</a>
    {{Form::close()}}
@endsection