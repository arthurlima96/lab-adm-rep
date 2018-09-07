@extends('layouts.template1')


@section('content')
<h1 class="title"> {{$title or 'Cadastro de Laboratórios'}}</h1>



@if(isset($errors) && count($errors)>0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
          <p>{{$error}}</p>
        @endforeach
    </div>
@endif

@if(isset($lab))
  {!! Form::model($lab, ['route' => ['laboratorios.update', $lab->id], 'class'=>'form', 'method' => 'put']) !!}
@else
  {!! Form::open(['route' => 'laboratorios.store','class' => 'form']) !!}
@endif
   <div class="form-group">
      {!! Form::text('nome', null ,['class'=>'form-control', 'placeholder'=>'Digite o nome do Laboratório']) !!}
   </div>

   {!! Form::submit('Salvar',['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}
<hr>
<a href="{{route('laboratorios.index')}}"><span class="glyphicon glyphicon-step-backward"></span> Voltar </a>
@endsection
