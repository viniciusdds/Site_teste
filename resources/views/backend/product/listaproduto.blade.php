@extends('backend.layouts.main')

@section('content')
<div class="card-body">
    <div class="row">
      <div class="col-sm-2">
        <a href="{{asset('images/1589375052219hqdefault.jpg')}}" data-toggle="lightbox" data-title="sample 1 - white" data-gallery="gallery">
          <img src="{{asset('images/1589375052219hqdefault.jpg')}}" class="img-fluid mb-2" alt="white sample">
        </a>
      </div>
      <div class="col-sm-2">
        <a href="{{asset('images/1589375090284IMG-20190704-WA0012.jpg')}}" data-toggle="lightbox" data-title="sample 2 - black" data-gallery="gallery">
          <img src="{{asset('images/1589375090284IMG-20190704-WA0012.jpg')}}" class="img-fluid mb-2" alt="black sample">
        </a>
      </div>

    </div>
  </div>
@endsection
