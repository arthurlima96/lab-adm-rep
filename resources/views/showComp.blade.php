@extends('layouts.template1')

@section('content')


<h1 class="title">{{$title or ''}}</h1>

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
@endsection
