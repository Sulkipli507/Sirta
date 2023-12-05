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
                    <li class="breadcrumb-item active" aria-current="page">Upload tugas akhir</li>
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
@if(session('status'))
    <div id="notification" class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Berhasil</strong>&nbsp;{{ session('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <div class="pull-left">
            <h4 class="text-blue h4">Upload Tugas Akhir</h4>
            <p class="mb-30">Form upload tugas akhir</p>
        </div>
    </div>
    <form action="{{ route('thesis-store') }}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="form-group row">
            <label for="name" class="col-sm-12 col-md-2 col-form-label">Nama Lengkap</label>
            <div class="col-sm-12 col-md-10">
                <input id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" type="text">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="nim" class="col-sm-12 col-md-2 col-form-label">NIM</label>
            <div class="col-sm-12 col-md-10">
                <input id="nim" name="nim"  class="form-control @error('nim') is-invalid @enderror" value="{{ old('nim') }}" type="text">
                @error('nim')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="concentration_id" class="col-sm-12 col-md-2 col-form-label">{{ __('Konsentrasi') }}</label>
            <div class="col-sm-12 col-md-10">
                <select id="concentration_id" class="custom-select form-control @error('concentration_id') is-invalid @enderror" name="concentration_id">
                    <option label="Pilih Konsentrasi"></option>
                    @foreach ($concentration as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                @error('concentration_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="title" class="col-sm-12 col-md-2 col-form-label">Judul Penelitian</label>
            <div class="col-sm-12 col-md-10">
                <input id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" type="text">
                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="abstract" class="col-sm-12 col-md-2 col-form-label">Abstrak</label>
            <div class="col-sm-12 col-md-10">
                <textarea id="abstract" name="abstract" class="form-control @error('abstract') is-invalid @enderror" value="{{ old('abstract') }}"></textarea>
                @error('abstract')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="file" class="col-sm-12 col-md-2 col-form-label">File</label>
            <div class="col-sm-10 col-md-8 mb-2">
                <input id="file" name="file" type="file" class="form-control-file form-control height-auto @error('file') is-invalid @enderror">
                @error('file')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-2">
                <a class="btn btn-primary text-light">
                    Cek plagiasi
                </a>
            </div>
        </div>
        <div class="form-group row">
            <label for="year" class="col-sm-12 col-md-2 col-form-label">Tahun Penelitian</label>
            <div class="col-sm-12 col-md-10">
                <input id="year" name="year" type="number" class="form-control-file form-control height-auto @error('year') is-invalid @enderror" value="{{ old('year') }}">
                @error('year')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="mentor1" class="col-sm-12 col-md-2 col-form-label">Dosen Pembimbing 1</label>
            <div class="col-sm-12 col-md-10">
                <select name="mentor1" class="form-control @error('mentor1') is-invalid @enderror">
                    <option label="Pilih Dosen"></option>
                    @foreach ($dosen as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                @error('mentor1')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="mentor2" class="col-sm-12 col-md-2 col-form-label">Dosen Pembimbing 2</label>
            <div class="col-sm-12 col-md-10">
                <select name="mentor2" class="form-control @error('mentor2') is-invalid @enderror">
                    <option label="Pilih Dosen"></option>
                    @foreach ($dosen as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                @error('mentor2')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="examiner1" class="col-sm-12 col-md-2 col-form-label">Dosen Penguji 1</label>
            <div class="col-sm-12 col-md-10">
                <select name="examiner1" class="form-control @error('examiner1') is-invalid @enderror">
                    <option label="Pilih Dosen"></option>
                    @foreach ($dosen as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                @error('examiner1')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="examiner2" class="col-sm-12 col-md-2 col-form-label">Dosen Penguji 2</label>
            <div class="col-sm-12 col-md-10">
                <select name="examiner2" class="form-control @error('examiner2') is-invalid @enderror">
                    <option label="Pilih Dosen"></option>
                    @foreach ($dosen as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                @error('examiner2')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="examiner3" class="col-sm-12 col-md-2 col-form-label">Dosen Penguji 3</label>
            <div class="col-sm-12 col-md-10">
                <select name="examiner3" class="form-control @error('examiner3') is-invalid @enderror">
                    <option label="Pilih Dosen"></option>
                    @foreach ($dosen as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                @error('examiner3')
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

<script>
    var notification = document.getElementById('notification');
    setTimeout(function() {
        notification.style.display = 'none';
    }, 5000);
</script>

@endsection