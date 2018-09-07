@extends('layouts.template1')

@section('content')
<h1 class="title">{{$title or ''}}</h1>
<a href="{{route('laboratorios.create')}}"class="btn btn-primary btn-add"><span class="glyphicon glyphicon-plus"></span>Cadastrar</a>
<table class="table table-hover">
  <tr>
    <th scope="col">ID</th>
    <th scope="col">NOME</th>
    <th scope="col">AÇÕES</th>
  </tr>
  @foreach ($labs as $lab)
    <tr>
      <td scope="row">{{$lab->id}}</td>
      <td  scope="row">{{$lab->nome}}</td>
      <td scope = "row">
          <a href="{{route('laboratorios.edit',$lab->id)}}" class="actions edit">Editar<span class="glyphicon glyphicon-search" aria-hidden="true"></span></a>
          <a href="{{route('laboratorios.show',$lab->id)}}" class="actions show">Visualizar<span class="glyphicon glyphicon-eye-open"></span></a>
      </td>
    </tr>
  @endforeach
</table>
{!! $labs->links()!!}
@endsection
