@extends('layouts.app')
@section('content')
    <h1>- Times</h1>
    {{Form::open(['url'=>'/times/buscar/ns','method'=>'GET'])}}
        <div class="row">
            <div class="col-sm-9">
                <div class="input-group ml-5">
                @if(Auth::check() && Auth::user()->isAdmin())
                        <div class="col-sm-3">
                            <a class="btn btn-success" href="{{url('times/create')}}">Criar</a>
                        </div>
                @endif
                    @if($busca !== null)
                        &nbsp;<a class="btn btn-info" href="{{url('/times')}}">Todos</a>&nbsp;
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
            <td>nação</td>
        </tr>
    @foreach($times as $time)
        <tr>
            <td><a href="/times/{{$time->id}}">{{$time->id}}</a></td>
            <td>{{$time->nome}}</td>
            <td>{{$time->nacao}}</td>
        </tr>
    @endforeach
    </table>
@endsection