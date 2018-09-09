@extends('layouts.app')
@section('content')<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{$title or ''}}</h5>
                </div>
                <div class="card-body">
                    @if(isset($errors) && count($errors)>0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                            <p>{{$error}}</p>
                            @endforeach
                        </div>
                    @endif

                    <p>ID: {{$comp->id}}</p>
                    <p>Nome: {{$comp->nome}}</p>
                    <p>Descrição: {{$comp->descricao}}</p>
                    <p>Ativo: {{$comp->ativo}}</p>
                    <p>Laboratório: {{$comp->laboratorio->nome}}</p>

                    <hr>
                    {!!Form::open(['route' =>['computadores.destroy',$comp->id], 'method' => 'delete']) !!}
                    {!! Form::submit("Deletar Laboratório: $comp->nome",['class' =>'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </div>
                <div class="card-footer text-muted">
                  <a href="{{route('laboratorios.index')}}"><span class="glyphicon glyphicon-step-backward"></span> Voltar </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
