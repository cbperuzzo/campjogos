@extends('layouts.app')
@section('content')
    {{Form::open(['route'=>'times.store','method'=>'POST','enctype'=>'multipart/form-data'])}}
    
        nome:
        {{Form::text('nome','',['class'=>'form-control','required',
        'placeholder'=>'nome'])}}

        nação:
        {{Form::text('nacao','',['class'=>'form-control','required',
        'placeholder'=>'nacao'])}}

        foto:
        {{Form::file('foto',['class'=>'form-control'])}}
        <hr>

        {{Form::submit('salvar',['class'=>'btn btn-success'])}}

        {{Form::button('cancelar' ,['onclick' => 'javascript:history.back()',
        'class' => 'btn btn-danger'])}}

    {{Form::close()}}
@endsection