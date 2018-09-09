@extends('layouts.app')
@section('content')<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <h5 class="card-title float-left">{{$title or ''}}</h5>
                  <a href="{{route('usuarios.create')}}"class="btn btn-primary float-right">Cadastrar</a>
                </div>
                <div class="card-body">
                  <table class="table table-hover">
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">NOME</th>
                      <th scope="col">EMAIL</th>
                      <th scope="col"></th>
                    </tr>
                    @foreach ($usuarios as $user)
                      <tr>
                        <td scope="row">{{$user->id}}</td>
                        <td  scope="row">{{$user->name}}</td>
                        <td  scope="row">{{$user->email}}</td>
                        <td scope = "row">
                          <!--  <a href="{{route('usuarios.edit',$user->id)}}" class="actions edit">Editar</a>
                            <a href="{{route('usuarios.show',$user->id)}}" class="actions show">Visualizar</a> -->
                        </td>
                      </tr>
                    @endforeach
                  </table>
                </div>
                <div class="card-footer text-muted">
                  {!! $usuarios->links()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
