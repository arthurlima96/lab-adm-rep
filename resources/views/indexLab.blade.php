@extends('layouts.app')
@section('content')<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <h5 class="card-title float-left">{{$title or ''}}</h5>
                  <a href="{{route('laboratorios.create')}}"class="btn btn-primary float-right">Cadastrar</a>
                </div>
                <div class="card-body">
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
                </div>
                <div class="card-footer text-muted">
                  {!! $labs->links()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
