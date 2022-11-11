@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <h3>
                        <ul>
                            <li><strong>times: </strong>{{$times}}</li>
                            <li><strong>jogos agendados: </strong>{{$ajogos}}</li>
                            <li><strong>campeonatos: </strong>{{$camp}}</li>
                        </ul>
                    </h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
