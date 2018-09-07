@extends('template.template1')

@section('content')
<h1 class="title">{{$title or ''}}</h1>
<a href="{{route('computadores.create')}}"class="btn btn-primary btn-add"><span class="glyphicon glyphicon-plus"></span>Cadastrar</a>
<table class="table table-hover">
  <tr>
    <th scope="col">ID</th>
    <th scope="col">NOME</th>
    <th scope="col">DESCRIÇÃO</th>
    <th scope="col">ATIVO</th>
    <th scope="col">LABORATÓRIO</th>
    <th scope="col">AÇÕES</th>
  </tr>
  @foreach ($comps as $comp)
    <tr>
      <td scope="row">{{$comp->id}}</td>
      <td  scope="row">{{$comp->nome}}</td>
      <td  scope="row">{{$comp->descricao}}</td>
      <td  scope="row">{{$comp->ativo}}</td>
      <td  scope="row">{{$comp->laboratorio->nome}}</td>
      <td scope = "row">
          <a href="{{route('computadores.edit',$comp->id)}}" class="actions edit">Editar<span class="glyphicon glyphicon-search" aria-hidden="true"></span></a>
          <a href="{{route('computadores.show',$comp->id)}}" class="actions show">Visualizar<span class="glyphicon glyphicon-eye-open"></span></a>
      </td>
    </tr>
  @endforeach
</table>
{!! $comps->links()!!}
@endsection
