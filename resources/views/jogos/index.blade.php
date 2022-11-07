@extends('layouts.app')
@section('content')
    <h1>- jogos</h1>
    {{Form::open(['url'=>'/jogos/buscar/ns','method'=>'GET'])}}
        <div class="row">
            <div class="col-sm-9">
                <div class="input-group ml-5">
                @if(Auth::check() && Auth::user()->isAdmin())
                        <div class="col-sm-3">
                            <a class="btn btn-success" href="{{url('jogos/create')}}">Criar</a>
                        </div>
                @endif
                    @if($busca !== null)
                        &nbsp;<a class="btn btn-info" href="{{url('/jogos')}}">Todos</a>&nbsp;
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
            <td>time 1</td>
            <td>time 2</td>
            <td>estado</td>
            <td>data</td>
            <td>hora</td>
        </tr>
    @foreach($jogos as $jogrow)
        <tr>
            <td><a href="/jogos/{{$jogrow->id}}">{{$jogrow->id}}</a></td>
            <td>{{$jogrow->time1r->nome}}</td>
            <td>{{$jogrow->time2r->nome}}</td>
            <td>{{$jogrow->Estado}}</td>
            <td>{{\Carbon\Carbon::create($jogrow->dataHora)->format('Y/d/m')}}</td>
            <td>{{\Carbon\Carbon::create($jogrow->dataHora)->format('H:i')}}</td>
        </tr>
    @endforeach
    </table>
@endsection
