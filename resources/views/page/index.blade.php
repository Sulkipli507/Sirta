@extends('frontend.master')
@section('hero')
    <div class="container-xxl py-5 bg-primary hero-header mb-5">
        <div class="container my-5 py-5 px-lg-5">
            <div class="row g-5 py-5">
                <div class="col-lg-6 text-center text-lg-start">
                    <h1 class="text-white mb-4 animated zoomIn">Selamat Datang di Sistem Informasi Repository Tugas Akhir</h1>
                    <p class="text-white pb-3 animated zoomIn">Temukan referensi tugas akhirmu di Sistem Informasi Repository Tugas Akhir Mahasiswa Informatika Universitas Sulawesi Barat</p>
                    <a href="#" class="btn btn-light py-sm-3 px-sm-5 rounded-pill me-3 animated slideInLeft">Hubungi kami</a>
                    <a href="{{ route('page-thesis') }}" class="btn btn-outline-light py-sm-3 px-sm-5 rounded-pill animated slideInRight">Jelajahi</a>
                </div>
                <div class="col-lg-6 text-center text-lg-start">
                    <img class="img-fluid" src="{{ asset('frontend/img/hero2.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    @include('page.about')
@endsection