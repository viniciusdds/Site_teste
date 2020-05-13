@extends('backend.layouts.main')

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Cadastrar Contato</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form role="form" action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputNome1">Nome</label>
          <input type="text" required name="name" class="form-control" id="exampleInputNome1" placeholder="Digite seu nome">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Email</label>
          <input type="email" required name="email" class="form-control" id="exampleInputEmail1" placeholder="Digite o e-mail">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Digite uma senha">
        </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Confirmar Cadastro</button>
      </div>
    </form>
  </div>
@endsection
