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
                        <li class="breadcrumb-item"><a class="text-white" href="#">Tugas Akhir</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Detail</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
{{-- <div class="container-xxl py-5">
    <div class="container px-lg-5">
        <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="position-relative d-inline text-primary ps-4">Our Services</h6>
            <h2 class="mt-2">What Solutions We Provide</h2>
        </div>
        <div class="row">     
            <div class="col-lg-12 col-md-12 wow zoomIn" data-wow-delay="0.1s">
                <div class="item justify-content-center text-center rounded">
                    <div class="service-icon flex-shrink-0">
                        <i class="fa fa-home fa-2x"></i>
                    </div>
                    <h5 class="mb-3">{{ $thesis->name }}</h5>
                    <p>{{ $thesis->title }}</p>
                    <p>{{ $thesis->abstract }}</p>
                    <p class="mb-3">{{ $thesis->year }}</p>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="container-xxl py-5">
    <div class="container px-lg-5">
        <div class="row g-5">
            <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.1s">
                <div class="section-title position-relative mb-4 pb-2">
                    <h5 class="position-relative text-primary">{{ $thesis->name }}</h5>
                    <h2 class="mt-2">{{ $thesis->title }}</h2>
                </div>
                <p class="mb-4">{{ $thesis->abstract }}</p>
                <div class="d-flex align-items-center mt-2">
                    <a class="btn btn-primary rounded-pill px-4 me-3" href="{{ asset('storage/'.$thesis->file) }}" target="_blank">Baca</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection