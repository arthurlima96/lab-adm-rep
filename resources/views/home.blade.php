@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Laboratório</div>
                    <div class="card-body">
                        <div class="card-columns">
                        @if (!empty($reserva))
                            <h5 class="card-title">{{$reserva->computador->nome}}</h5>
                            <p class="card-text">Você efetuou essa reserva às {{ date('H:i', strtotime($reserva->entrada)) }}</p>
                                <form method="post" action="{{ route('terminar', $reserva->id) }}">
                                    {{ csrf_field() }}
                                    <input class="btn btn-danger" type="submit" name="submit" value="Terminar Reserva">
                                </form>
                        @else
                            @forelse ($laboratorios as $lab)
                                <div class="card text-white">
                                    <div class="card-body text-center  bg-primary">
                                        <p class="card-text">{{$lab->nome}}</p>
                                    </div>
                                    <div class="card-footer">
                                        <a href="{{route('lab_computadores',$lab->id)}}" class="btn btn-primary btn-sm">Acessar</a>
                                    </div>
                                </div>
                            @empty
                                <p>Não Existe Laboratórios</p>
                            @endforelse
                        @endif
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
