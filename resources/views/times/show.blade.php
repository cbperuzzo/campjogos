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
    
@endsection