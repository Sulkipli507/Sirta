@extends('backend.master')
@section('content')
@if($thesis->isNotEmpty())
    <form class="d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input value="{{Request::get('name')}}" name="name" type="text" class="form-control bg-light border-0 small" placeholder="Cari mahasiswa"
                aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                    <i class="icon-copy dw dw-search2"></i>
                </button>
            </div>
        </div>
    </form>
    <div class="product-wrap">
        <div class="product-list">
            <ul class="row">
                @foreach ($thesis as $key => $item)
                    <li class="col-lg-4 col-md-6 col-sm-12">
                        <div class="product-box">   
                            <div class="producct-img">
                                <img src="{{ asset('backend/vendors/images/product-img1.jpg') }}" alt="">
                            </div>
                            <div class="product-caption">
                                <h4><a href="#">{{ $item->title }}</a></h4>
                                <div class="price">
                                    <ins>{{ $item->name }}</ins>
                                </div>
                                <a href="{{ asset('storage/'.$item->file) }}" target="_blank" class="btn btn-outline-primary">Buka</a>
                            </div>       
                        </div>  
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@else
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
        Data Tidak Ditemukan
    </div>
@endif
@endsection