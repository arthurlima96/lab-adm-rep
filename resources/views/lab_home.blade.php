@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Laboratório</div>
                    <div class="card-body">
                        <div class="card-columns">
                            @forelse ($computadores as $computador)
                                @if ($computador->ativo)
                                    <div class="card text-white">
                                        <div class="card-body text-center  bg-danger ">
                                            <p class="card-text">{{$computador->nome}}</p>
                                        </div>
                                        <div class="card-footer">
                                            <small class="text-muted">Encontra-se reservado</small>
                                        </div>
                                    </div>
                                @else
                                    <div class="card text-white">
                                        <div class="card-body text-center   bg-success">
                                            <p class="card-text">{{$computador->nome}}</p>
                                        </div>
                                        <div class="card-footer">
                                        <form method="post" action="{{ route('reservar', $computador->id) }}">
                                            {{ csrf_field() }}
                                            <input class="btn btn-primary btn-sm" type="submit" name="submit" value="Reservar">
                                        </form>
                                        </div>
                                    </div>
                                @endif
                            @empty
                                <p>Não Existe Laboratórios</p>
                            @endforelse
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
