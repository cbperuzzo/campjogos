@extends('layouts.app')
@section('content')
    <h3>{{$camp->nome}}</h3>
    <ul>
        <li><strong>id: </strong>{{$camp->id}}</li>
        <li><strong>local: </strong>{{$camp->local}}</li>
    </ul>
    @if(Auth::check() && Auth::user()->isAdmin())
    {{Form::open(['route'=>['campeonatos.destroy',$camp->id],'method'=>'DELETE'])}}
       
        <a class="btn btn-warning" href="{{$camp->id}}/edit">Editar</a>
        {{Form::submit('Excluir',['class'=>'btn btn-danger'])}}
        
    {{Form::close()}}
    @endif
    <a class="btn btn-secondary" href="/campeonatos">Voltar</a>
@endsection