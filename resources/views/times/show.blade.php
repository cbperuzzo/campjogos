@extends('layouts.app')
@section('content')
    <h3>{{$time->nome}}</h3>
    <ul>
        <li><strong>id: </strong>{{$time->id}}</li>
        <li><strong>nação: </strong>{{$time->nacao}}</li>
    </ul>
    @php
        $nomeimagem = "";
        if(file_exists("./img/times/".md5($time->id).".jpg")) {
            $nomeimagem = "./img/times/".md5($time->id).".jpg";
        } elseif (file_exists("./img/times/".md5($time->id).".png")) {
            $nomeimagem = "./img/times/".md5($time->id).".png";
        } elseif (file_exists("./img/times/".md5($time->id).".gif")) {
            $nomeimagem =  "./img/times/".md5($time->id).".gif";
        } elseif (file_exists("./img/times/".md5($time->id).".webp")) {
            $nomeimagem = "./img/times/".md5($time->id).".webp";
        } elseif (file_exists("./img/times/".md5($time->id).".jpeg")) {
            $nomeimagem = "./img/times/".md5($time->id).".jpeg";
        } else {
            $nomeimagem = "./img/times/semfoto.jpg";
        }
    @endphp
    <div style="max-width:300px;max-height:300px;border:solid grey 1px;">
        {{Html::image(asset($nomeimagem),'Foto de '.$time->nome,["class"=>"img-thumbnail w-75 mx-auto d-block"])}}
    </div>
    <br>
    @if(Auth::check() && Auth::user()->isAdmin())
    {{Form::open(['route'=>['times.destroy',$time->id],'method'=>'DELETE'])}}
                
        <a class="btn btn-warning" href="{{$time->id}}/edit">Editar</a>

        @if ($nomeimagem !== "./img/livros/semfoto.jpg")
            {{Form::hidden('foto',$nomeimagem)}}
        @endif

        {{Form::submit('Excluir',['class'=>'btn btn-danger'])}}

    {{Form::close()}}
    @endif  
    <a class="btn btn-secondary" href="/times">Voltar</a>
    <hr>
    <h4>jogos agendados</h4>
    <table class="table table-secondary table-striped">
        <tr class="table-dark">
            <td>#</td>
            <td>time 1</td>
            <td>time 2</td>
            <td>estado</td>
            <td>data</td>
            <td>hora</td>
        </tr>
    @foreach($time->jogos1 as $jog1row)
        @if($jog1row->Estado=="agendado")
            <tr>
                <td><a href="/jogos/{{$jog1row->id}}">{{$jog1row->id}}</a></td>
                <td>{{$jog1row->time1r->nome}}</td>
                <td>{{$jog1row->time2r->nome}}</td>
                <td>{{$jog1row->Estado}}</td>
                <td>{{\Carbon\Carbon::create($jog1row->dataHora)->format('d/m/Y')}}</td>
                <td>{{\Carbon\Carbon::create($jog1row->dataHora)->format('H:i')}}</td>
            </tr>
        @endif
    @endforeach
    @foreach($time->jogos2 as $jog2row)
        @if($jog2row->Estado=="agendado")
            <tr>
                <td><a href="/jogos/{{$jog2row->id}}">{{$jog2row->id}}</a></td>
                <td>{{$jog2row->time1r->nome}}</td>
                <td>{{$jog2row->time2r->nome}}</td>
                <td>{{$jog2row->Estado}}</td>
                <td>{{\Carbon\Carbon::create($jog2row->dataHora)->format('d/m/Y')}}</td>
                <td>{{\Carbon\Carbon::create($jog2row->dataHora)->format('H:i')}}</td>
            </tr>
        @endif
    @endforeach
    </table>
@endsection