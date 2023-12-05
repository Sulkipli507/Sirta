@extends('backend.master')
@section('header')
<div class="page-header">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Konsentrasi</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah konsentrasi</li>
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
<!-- Default Basic Forms Start -->
<div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <div class="pull-left">
            <h4 class="text-blue h4">Tambah Konsentrasi</h4>
            <p class="mb-30">Form tambah konsentrasi</p>
        </div>
    </div>
    <form action="{{ route('concentration-store') }}" method="POST">
        @csrf
        <div class="form-group row">
            <label for="name" class="col-sm-12 col-md-2 col-form-label">Konsentrasi</label>
            <div class="col-sm-12 col-md-10">
                <input id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" type="text" placeholder="Nama konsentrasi">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-12 col-md-2 col-form-label"></div>
            <div class="col-sm-12 col-md-10">
                <button type="submit" class="btn btn-lg btn-block btn-primary">
                    {{ __('Simpan') }}
                </button>
            </div>
        </div>
    </form>
</div>

<!-- Default Basic Forms End -->
@endsection