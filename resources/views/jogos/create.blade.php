@extends('layouts.app')
@section('content')
    <h1>- jogos</h1>

    {{Form::open(['route' => 'jogos.store','method' => 'POST'])}}

    campeonato:
    {{Form::text('camp','',['class'=>'form-control','required',
    'placeholde'=>'campeonato','list'=>'listcamp'])}}

    <datalist id="listcamp">
        @foreach($camps as $camp)
        <option value="{{$camp->id}}">{{$camp->nome}}</option>
        @endforeach
    </datalist>

    time 1:
    {{Form::text('time1','',['class'=>'form-control','required',
    'placeholde'=>'time 1','list'=>'listtime1'])}}

    <datalist id="listtime1">
        @foreach($times as $time)
        <option value="{{$time->id}}">{{$time->nome}}</option>
        @endforeach
    </datalist>

    time 2:
    {{Form::text('time2','',['class'=>'form-control','required',
    'placeholde'=>'time 2','list'=>'listtime2'])}}

    <datalist id="listtime2">
        @foreach($times as $time)
        <option value="{{$time->id}}">{{$time->nome}}</option>
        @endforeach
    </datalist>

    time 1 pontos:
    {{Form::number('t1pontos','',['class'=>'form-control'])}}

    time 2 pontos:
    {{Form::number('t2pontos','',['class'=>'form-control'])}}

    duração aproximada (em minutos):
    {{Form::number('mddapx','',['class'=>'form-control','required'])}}

    data
    {{Form::date('data','',['class'=>'form-control','required'])}}

    horário
    {{Form::time('hora','',['class'=>'form-control','required'])}}

    <br>

    {{Form::submit('salvar',['class'=>'btn btn-success'])}}

    {{Form::button('cancelar' ,['onclick' => 'javascript:history.back()',
    'class' => 'btn btn-danger'])}}

    {{Form::close()}}
@endsection