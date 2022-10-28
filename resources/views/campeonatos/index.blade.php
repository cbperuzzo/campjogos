@extends('layouts.app')
@section('content')
    <h1>- campeonatos</h1>
    {{Form::open(['url'=>'/campeonatos/buscar/ns','method'=>'GET'])}}
        <div class="row">
            <div class="col-sm-9">
                <div class="input-group ml-5">
                @if(Auth::check() && Auth::user()->isAdmin())
                        <div class="col-sm-3">
                            <a class="btn btn-success" href="{{url('campeonatos/create')}}">Criar</a>
                        </div>
                @endif
                    @if($busca !== null)
                        &nbsp;<a class="btn btn-info" href="{{url('/campeonatos')}}">Todos</a>&nbsp;
                    @endif
                    {{Form::text('busca',$busca,['class'=>'form-control','required','placeholder'=>'buscar'])}}
                    &nbsp;
                    <span class="input-group-btn">
                        {{Form::submit('Buscar',['class'=>'btn btn-secondary'])}}
                    </span>
                </div>
            </div>
        </div>
    {{Form::close()}}
    <hr>
    <table class="table table-secondary table-striped">
        <tr class="table-dark">
            <td>#</td>
            <td>nome</td>
            <td>local</td>
        </tr>
    @foreach($camp as $camprow)
        <tr>
            <td><a href="/campeonatos/{{$camprow->id}}">{{$camprow->id}}</a></td>
            <td>{{$camprow->nome}}</td>
            <td>{{$camprow->local}}</td>
        </tr>
    @endforeach
    </table>
@endsection