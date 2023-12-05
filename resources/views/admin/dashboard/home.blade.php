{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends('backend.master')
@section('content')
<div class="card-box pd-20 height-100-p mb-30">
    <div class="row align-items-center">
        <div class="col-md-4">
            <img src="{{ asset('backend/vendors/images/banner-img.png')}}" alt="">
        </div>
        <div class="col-md-8">
            <h4 class="font-20 weight-500 mb-10 text-capitalize">
                Welcome back <div class="weight-600 font-30 text-blue">{{ Auth::user()->name }}</div>
            </h4>
            @if (Auth::user()->role == "Admin")
                <p class="font-18 max-width-600">Gunakan SIRTA untuk mengelola repository Tugas Akhir Mahasiswa Informatika Universitas Sulawesi Barat</p>
            @elseif (Auth::user()->role == "Dosen")
                <p class="font-18 max-width-600">Gunakan SIRTA untuk melihat repository Tugas Akhir Mahasiswa Informatika Universitas Sulawesi Barat</p>
            @else
                <p class="font-18 max-width-600">Gunakan SIRTA untuk menyimpan repository Tugas Akhirmu</p>
            @endif
        </div>
    </div>
</div>

@if (Auth::user()->role == "Admin")
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
        <div class="card-box pd-30 height-100-p">
          <div class="progress-box text-center">
             <h1>{{ $countUser }}</h1>
            <h5 class="text-light-blue padding-top-10 h5">Jumlah Pengguna</h5>
          </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
        <div class="card-box pd-30 height-100-p">
          <div class="progress-box text-center">
             <h1>{{ $countThesis }}</h1>
            <h5 class="text-light-blue padding-top-10 h5">Jumlah Tugas akhir</h5>
          </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
        <div class="card-box pd-30 height-100-p">
          <div class="progress-box text-center">
             <h1>{{ $countActive }}</h1>
            <h5 class="text-light-blue padding-top-10 h5">Jumlah User Active</h5>
          </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
        <div class="card-box pd-30 height-100-p">
          <div class="progress-box text-center">
             <h1>{{ $countInactive }}</h1>
            <h5 class="text-light-blue padding-top-10 h5">Jumlah User Inactive</h5>
          </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 mb-30">
        <div class="card-box pd-30 height-100-p">
          <div class="progress-box text-center">
             <h1>{{ $countStudent }}</h1>
            <h5 class="text-light-blue padding-top-10 h5">Jumlah Mahasiswa</h5>
          </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 mb-30">
        <div class="card-box pd-30 height-100-p">
          <div class="progress-box text-center">
             <h1>{{ $countLecturer }}</h1>
            <h5 class="text-light-blue padding-top-10 h5">Jumlah Dosen</h5>
          </div>
        </div>
    </div>
</div>
@endif

@endsection
