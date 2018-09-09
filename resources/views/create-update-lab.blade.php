@extends('layouts.app')
@section('content')<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <h5 class="title"> {{$title or 'Cadastro de Laboratórios'}}</h5>
                </div>
                <div class="card-body">
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
                </div>
                <div class="card-footer text-muted">
                  <a href="{{route('laboratorios.index')}}"><span class="glyphicon glyphicon-step-backward"></span> Voltar </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
