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

<p>ID: {{$lab->id}}</p>
<p>Nome: {{$lab->nome}}</p>

<hr>
{!!Form::open(['route' =>['laboratorios.destroy',$lab->id], 'method' => 'delete']) !!}
{!! Form::submit("Deletar Laboratório: $lab->nome",['class' =>'btn btn-danger']) !!}
{!! Form::close() !!}
@endsection
