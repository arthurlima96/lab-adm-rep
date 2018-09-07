@extends('template.template1')


@section('content')
<h1 class="title"> {{$title or 'Cadastro de Computadores'}}</h1>



@if(isset($errors) && count($errors)>0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
          <p>{{$error}}</p>
        @endforeach
    </div>
@endif

@if(isset($comp))
  {!! Form::model($comp, ['route' => ['computadores.update', $comp->id], 'class'=>'form', 'method' => 'put']) !!}
@else
  {!! Form::open(['route' => 'computadores.store','class' => 'form']) !!}
@endif
   <div class="form-group">
      {!! Form::text('nome', null ,['class'=>'form-control', 'placeholder'=>'Digite o nome do Computador']) !!}
   </div>

   <div class="form-group">
     <label>{!! Form::checkbox('ativo') !!} Ativo?</label>
   </div>

      <div class="form-group">
        <select name = "laboratorio_id" class = "form-control">
         @foreach($labs as $lab)
         <option value = "{{$lab->id}}" @if (isset($comp) && $comp->laboratorio_id == $lab->id)
         selected @endif> {{$lab->nome}}</option>
         @endforeach
        </select>
      </div>

   <div class="form-group">
     {!! Form::textarea('descricao', null ,['class'=>'form-control', 'placeholder'=>'Descrição']) !!}
   </div>


   {!! Form::submit('Salvar',['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}
<hr>
<a href="{{route('computadores.index')}}"><span class="glyphicon glyphicon-step-backward"></span> Voltar </a>
@endsection
