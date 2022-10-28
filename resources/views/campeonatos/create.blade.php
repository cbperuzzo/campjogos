@extends('layouts.app')
@section('content')
    <h1>- campeonatos</h1>

    {{Form::open(['route' => 'campeonatos.store','method' => 'POST'])}}

    nome:
    {{Form::text('nome','',['class'=>'form-control','required',
    'placeholder'=>'nome'])}}

    local:
    {{Form::text('local','',['class'=>'form-control','required',
    'placeholder'=>'local'])}}

    {{Form::submit('salvar',['class'=>'btn btn-success'])}}

    {{Form::button('cancelar' ,['onclick' => 'javascript:history.back()',
    'class' => 'btn btn-danger'])}}

    {{Form::close()}}
@endsection