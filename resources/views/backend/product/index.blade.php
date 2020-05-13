@extends('backend.layouts.main')

@section('content')

    @if(session('success'))
        <script>
             setTimeout(function(){ $("#div").fadeOut(); }, 5000);
        </script>
        <div id="div" class="alert alert-success">
            {{session('success')}}
        </div>
    @endif
    @if (session('error'))
        <script>
            setTimeout(function(){ $("#div").fadeOut(); }, 5000);
        </script>
        <div id="div" class="alert alert-error">
            {{session('error')}}
        </div>
    @endif

        <!-- /.card-header -->
        <div class="card-body">
        <a href="{{route('product.create')}}">
                <button type="button" class="btn btn-block bg-gradient-success">Add</button>
            </a>
            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12 col-md-6"></div>
                    <div class="col-sm-12 col-md-6"></div>
                </div><div class="row">
                <div class="col-sm-12">
            <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
                <thead>
                    <tr role="row" style="text-align: center">
                        <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Nome</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">E-mail</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Senha</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="3" aria-label="Engine version: activate to sort column ascending">Imagem</th>
                    </tr>
                </thead>
            <tbody>

                @foreach ($data as $info)
                    <tr role="row" class="odd" style="text-align: center">
                    <td tabindex="0" class="sorting_1">{{$info->nome}}</td>
                    <td>{{$info->descricao}}</td>
                    <td>{{$info->preco}}</td>
                   {{--  <td>
                        <img src="{{asset('images/'.$info->image)}}" width="60px" height="60px">
                    </td> --}}
                    <td>
                        <a class="btn btn-app" href="{{route('product.show', $info->id)}}">
                            {{-- <span class="badge bg-purple">891</span> --}}
                            <i class="fas fa-images"></i>Add Fotos
                        </a>
                    </td>
                    <td>
                        <a class="btn btn-app" href="{{route('product.edit', $info->id)}}">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                    </td>
                    <td>
                        <form action="{{route('product.destroy', $info->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-app">
                                <i class="fas fa-trash-alt"></i> Deletar
                            </button>
                        </form>
                    </td>
                    </tr>
                 @endforeach

            </tbody>
            <tfoot>
            </tfoot>
          </table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="example2_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="example2_previous"><a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="6" tabindex="0" class="page-link">6</a></li><li class="paginate_button page-item next" id="example2_next"><a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
        </div>
        <!-- /.card-body -->
@endsection
