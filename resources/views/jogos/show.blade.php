@extends('layouts.app')
@section('content')
    <ul>
        <h4>
        <li><strong>{{$jogo->time1r->nome}}: </strong>{{$jogo->t1pontos}}</li>
        <li><strong>{{$jogo->time2r->nome}}: </strong>{{$jogo->t2pontos}}</li>
        </h4>
        <hr>
        <li><strong>campeonato: </strong>{{$jogo->campr->nome}}</li>
        <li><strong>horário: </strong>{{\Carbon\Carbon::create($jogo->dataHora)->format('H:i')}}</li>
        <li><strong>data: </strong>{{\Carbon\Carbon::create($jogo->dataHora)->format('d/m/Y')}}</li>
        
    </ul>
    @if(Auth::check() && Auth::user()->isAdmin())
    {{Form::open(['route'=>['jogos.destroy',$jogo->id],'method'=>'DELETE'])}}

        @if($jogo->estado=='finalizado')
        <a class="btn btn-warning" href="{{$jogo->id}}/edit">inseir placar</a>
        @endif

        {{Form::submit('Excluir',['class'=>'btn btn-danger'])}}
        
    {{Form::close()}}
    @endif
    <a class="btn btn-secondary" href="/jogos">Voltar</a>
    
@endsection