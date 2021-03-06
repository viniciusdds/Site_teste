@extends('backend.layouts.main')

@section('content')
  <!-- Ekko Lightbox -->
  <link rel="stylesheet" href="{{asset('website/backend/plugins/ekko-lightbox/ekko-lightbox.css')}}">
<div class="card-body">
    <div class="row">
        <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
            <thead>
                <tr role="row" style="text-align: center; background: #999; color: white;">
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Produto</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Descrição</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Preço</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Imagens</th>
                </tr>
            </thead>
        <tbody>


            @foreach ($data as $info)
                <tr role="row" class="odd" style="text-align: center">
                    <td tabindex="0" class="sorting_1">{{$info->nome}}</td>
                    <td>{{$info->descricao}}</td>
                    <td>{{$info->preco}}</td>
                    <td>
                        @php
                          $id = 0;
                        @endphp

                        @foreach ($images as $image)

                            @if($info->id == $image->product_id)
                                @php($id++)
                                    @if($id == 1)
                                        <a href="{{asset("images/$image->filename")}}" class="btn btn-app" data-toggle="lightbox" data-title="{{$info->nome}}" data-gallery="gallery{{$info->nome}}">
                                            <i class="fas fa-edit"></i> Visualizar
                                        </a>
                                    @else
                                        <a href="{{asset("images/$image->filename")}}" data-toggle="lightbox" data-title="{{$info->nome}}" data-gallery="gallery{{$info->nome}}">
                                        </a>
                                    @endif
                                @else
                                    @php($id = 0)
                            @endif
                        @endforeach

                    </td>
                </tr>
             @endforeach
        </tbody>
        <tfoot>
        </tfoot>
      </table>


    </div>
  </div>

@endsection
