@extends('layouts.app')
@section('content')
    <h1>- jogos</h1>
    @if(Auth::check() && Auth::user()->isAdmin())
        <div class="col-sm-3">
            <a class="btn btn-success" href="{{url('jogos/create')}}">Criar</a>
        </div>
    @endif
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
            <td>{{\Carbon\Carbon::create($jogrow->dataHora)->format('d/m/Y')}}</td>
            <td>{{\Carbon\Carbon::create($jogrow->dataHora)->format('H:i')}}</td>
        </tr>
    @endforeach
    </table>
@endsection
