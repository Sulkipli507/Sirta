@extends('backend.master')
@section('content')
<!-- Default Basic Forms Start -->
<div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <div class="pull-left">
            <h4 class="text-blue h4">Tambah Konsentrasi</h4>
            <p class="mb-30">All bootstrap element classies</p>
        </div>
    </div>
    <form action="{{ route('concentration-store') }}" method="POST">
        @csrf
        <div class="form-group row">
            <label for="name" class="col-sm-12 col-md-2 col-form-label">Konsentrasi</label>
            <div class="col-sm-12 col-md-10">
                <input id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" type="text" placeholder="Rekayasa Perangkat Lunak">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-12 d-flex justify-content-center">
                <button type="submit" class="btn btn-lg btn-block btn-primary">
                    {{ __('Simpan') }}
                </button>
            </div>
        </div>
    </form>
</div>
<!-- Default Basic Forms End -->
@endsection