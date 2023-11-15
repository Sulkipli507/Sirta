@extends('backend.master')
@section('content')
@if($thesis->isNotEmpty())
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
                                    <a href="{{ asset('storage/'.$item->file) }}" target="_blank" class="btn btn-outline-primary">Read More</a>
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