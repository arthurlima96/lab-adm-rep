@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Laboratório</div>
                    <div class="card-body">
                        <div class="card-columns">
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
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
