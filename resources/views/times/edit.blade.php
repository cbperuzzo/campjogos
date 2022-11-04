@extends('layouts.app')
@section('content')

    {{Form::open(['route'=>['times.update',$time->id],'method'=>'PUT','enctype'=>'multipart/form-data'])}}
        
        nome:
        {{Form::text('nome',$time->nome,['class'=>'form-control','required',
        'placeholder'=>'nome'])}}

        nação:
        {{Form::text('nacao',$time->nacao,['class'=>'form-control','required',
        'placeholder'=>'nacao'])}}

        foto:
        {{Form::file('foto',['class'=>'form-control'])}}
        <hr>

        {{Form::submit('salvar',['class'=>'btn btn-success'])}}

        {{Form::button('cancelar' ,['onclick' => 'javascript:history.back()',
        'class' => 'btn btn-danger'])}}
        
    {{Form::close()}}

@endsection