@extends('backend.master')
@section('content')
{{-- <div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <h4 class="text-blue h4">Form Repositori Tugas Akhir</h4>
        <p class="mb-30">Lengkapi form dibawah ini</p>
    </div>
    <div class="wizard-content">
        <form id="thesis-form" action="{{ route('thesis-store') }}" enctype="multipart/form-data" method="POST" class="tab-wizard wizard-circle wizard">
            @csrf
            <h5>Mahasiswa</h5>
            <section>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label >Nama lengkap </label>
                            <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label >Nomor induk mahasiswa </label>
                            <input name="nim" type="text" class="form-control @error('nim') is-invalid @enderror" value="{{ old('nim') }}">
                            @error('nim')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Konsentrasi </label>
                            <select name="concentration_id" class="form-control @error('concentration_id') is-invalid @enderror">
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
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tahun penelitian </label>
                            <input name="year" type="number" class="form-control @error('year') is-invalid @enderror" value="{{ old('year') }}">
                            @error('year')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </section>
            <!-- Step 2 -->
            <h5>Tugas Akhir</h5>
            <section>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Judul </label>
                            <input name="title" type="text" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
							<label>File</label>
							<input name="file" type="file" class="form-control-file form-control height-auto @error('file') is-invalid @enderror" value="{{ old('file') }}">
                            @error('file')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
						</div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Abstrak</label>
                            <textarea name="abstract" class="form-control @error('abstract') is-invalid @enderror" value="{{ old('abstract') }}"></textarea>
                            @error('abstract')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </section>
            <!-- Step 3 -->
            <h5>Dosen Pembimbing</h5>
            <section>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Pembimbing 1</label>
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
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Pembimbing 2</label>
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
                </div>
            </section>
            <!-- Step 4 -->
            <h5>Dosen Penguji</h5>
            <section>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Penguji 1</label>
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
                        <div class="form-group">
                            <label>Penguji 2</label>
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
                        <div class="form-group">
                            <label>Penguji 3</label>
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
                </div>
            </section>
        </form>
        <button type="button" id="success-modal-btn" hidden data-toggle="modal" data-target="#success-modal" data-backdrop="static">Launch modal</button>
        <div class="modal fade" id="success-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered max-width-400" role="document">
                <div class="modal-content">
                    <div class="modal-body text-center font-18">
                        <h3 class="mb-20">Form Submitted!</h3>
                        <div class="mb-30 text-center"><img src="{{ asset('backend/vendors/images/success.png')}}"></div>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    </div>
                    <div class="modal-footer justify-content-center">
                        <a href="{{ route('home') }}" class="btn btn-primary">Done</a>
                    </div>
                </div>
            </div>
        </div>
        <button type="button" id="error1-modal-btn" hidden data-toggle="modal" data-target="#error1-modal" data-backdrop="static">Launch modal</button>
        <div class="modal fade" id="error1-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered max-width-400" role="document">
                <div class="modal-content">
                    <div class="modal-body text-center font-18">
                        <h5 class="pt-20 h5 mb-30">A error message!</h5>
                        <div class="max-width-200 mx-auto">
                            <button type="button" class="btn mb-20 btn-primary btn-block" id="sa-error">Click me</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <div class="pull-left">
            <h4 class="text-blue h4">Upload Tugas Akhir</h4>
            <p class="mb-30">All bootstrap element classies</p>
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
            <div class="col-sm-12 col-md-10">
                <input id="file" name="file" type="file" class="form-control-file form-control height-auto @error('file') is-invalid @enderror">
                @error('file')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
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
            <div class="col-sm-12 d-flex justify-content-center">
                <button type="submit" class="btn btn-lg btn-block btn-primary">
                    {{ __('Simpan') }}
                </button>
            </div>
        </div>
    </form>
</div>
@endsection