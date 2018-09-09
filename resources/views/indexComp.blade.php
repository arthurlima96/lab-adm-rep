@extends('layouts.app')
@section('content')<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <h5 class="card-title float-left">{{$title or ''}}</h5>
                  <a href="{{route('computadores.create')}}"class="btn btn-primary float-right">Cadastrar</a>
                </div>
                <div class="card-body">
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
                </div>
                <div class="card-footer text-muted">
                {!! $comps->links()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
