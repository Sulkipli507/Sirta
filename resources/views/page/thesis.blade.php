@extends('frontend.master')
@section('hero')
<div class="container-xxl py-5 bg-primary hero-header mb-5">
    <div class="container my-5 py-5 px-lg-5">
        <div class="row g-5 py-5">
            <div class="col-12 text-center">
                <h1 class="text-white animated zoomIn">Tugas Akhir</h1>
                <hr class="bg-white mx-auto mt-0" style="width: 90px;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="#">Beranda</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Tugas Akhir</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container-xxl py-5">
    <div class="container px-lg-5">
        <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="position-relative d-inline text-primary ps-4">Tugas Akhir</h6>
            <h2 class="mt-2">Tugas Akhir Mahasiswa Informatika</h2>
        </div>
        <div class="mb-4 position-relative w-100 mt-3">
            <form>
                <input value="{{ Request::get('keyword') }}" name="keyword" class="form-control border-0 rounded-pill w-100 ps-4 pe-5" type="text" placeholder="Search..." style="height: 48px;">
                <button type="button" class="btn shadow-none position-absolute top-0 end-0 mt-1 me-2"><i class="fa fa-search text-primary fs-4"></i></button>
            </form>
        </div>
        <div class="row g-4">
            @foreach ($thesis as $item)      
                <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.1s">
                    <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                        <div class="service-icon flex-shrink-0">
                            <img width="50px" height="50px" src="{{ asset('frontend/img/unsulbar.png') }}" alt="">
                        </div>
                        <h5 class="mb-2">{{ $item->name }}</h5>
                        <p>{{ $item->title }}</p>
                        <p>{{ $item->year }}</p>
                        {{-- <p><i class="fa fa-eye" aria-hidden="true">&nbsp;{{ $item->count }}</i></p>  --}}
                        <a class="btn px-3 mt-auto mx-auto mb-4" href="{{ route('page-show',$item->id) }}">Selengkapnya</a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-4 blog-pagination mb-30">
            <div class="btn-toolbar justify-content-center mb-15">
                <div class="btn-group">
                    {{$thesis->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection