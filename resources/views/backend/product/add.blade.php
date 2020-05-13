@extends('backend.layouts.main')

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Cadastro de Produto</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form role="form" action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
      @csrf
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
          <label for="exampleInputNome1">Produto:</label>
          <input type="text"  name="nome" class="form-control" id="exampleInputNome1" placeholder="Digite o nome do produto">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Descrição:</label>
          <input type="text"  name="descricao" class="form-control" id="exampleInputEmail1" placeholder="Digite a descrição do produto">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Preço:</label>
            <input type="text"  name="preco" class="form-control" id="exampleInputEmail1" placeholder="Insira o preço do produto">
          </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary"><b>Confirmar Cadastro</b></button>
      </div>
    </form>
  </div>
@endsection
