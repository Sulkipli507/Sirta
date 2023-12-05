@extends('backend.master')
@section('header')
<div class="page-header">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Tugas Akhir</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Diuji</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-6 col-sm-12 text-right">
            <div class="dropdown">
                <button class="btn btn-primary" role="button">
                    {{ date('Y') }}
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

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
                                <img src="{{ asset('backend/vendors/images/skripsi.jpg') }}" alt="">
                            </div>
                            <div class="product-caption text-center">
                                <h4>{{ $item->title }}</h4>
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