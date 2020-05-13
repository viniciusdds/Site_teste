@extends('backend.layouts.main')

@section('content')
    <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Editar Contato</h3>
    </div>

    <!-- /.card-header -->
    <!-- form start -->
    <form role="form" action="{{route('users.update', $user->id)}}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')

        @if($errors->any())
            @foreach ($errors->all() as $error)
                <br>
                <div id="div" class="alert alert-danger">
                    {{$error}}
                </div>
            @endforeach
        @endif

      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputNome1">Nome</label>
          <input type="text" name="name" value="{{$user->name}}" class="form-control" id="exampleInputNome1" placeholder="Digite seu nome">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Email</label>
          <input type="text" name="email" value="{{$user->email}}" class="form-control" id="exampleInputEmail1" placeholder="Digite o e-mail">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" value="{{$user->password}}" class="form-control" id="exampleInputPassword1" placeholder="Digite um senha">
        </div>
        <br>

      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Confirmar Edição</button>
      </div>
    </form>
  </div>
@endsection
