@extends('backend.master')
@section('header')
<div class="page-header">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>User</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit user</li>
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
    <!-- Default Basic Forms Start -->
    <div class="row">
        <div class="col-xl-6 mb-30">
            <div class="card-box height-100-p pd-20">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Edit User</h4>
                        <p class="mb-30">Form edit user</p>
                    </div>
                </div>
                <form action="{{ route('user-update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="role" class="col-sm-12 col-md-2 col-form-label">{{ __('Role') }}</label>
                        <div class="col-sm-12 col-md-10">
                            <select id="role" class="custom-select form-control @error('role') is-invalid @enderror" name="role">
                                <option>{{ $user->role }}</option>
                                <option value="Mahasiswa" {{ old('role') == 'Mahasiswa' ? 'selected' : '' }}>{{ __('Mahasiswa') }}</option>
                                <option value="Dosen" {{ old('role') == 'Dosen' ? 'selected' : '' }}>{{ __('Dosen') }}</option>
                                <option value="Admin" {{ old('role') == 'Admin' ? 'selected' : '' }}>{{ __('Admin') }}</option>
                            </select>
                            @error('role')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-12 col-md-2 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-12 col-md-10">
                            <input id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}" type="text" placeholder="Johnny Brown">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="no_unik" class="col-sm-12 col-md-2 col-form-label">Nomor Unik</label>
                        <div class="col-sm-12 col-md-10">
                            <input id="no_unik" name="no_unik"  class="form-control @error('no_unik') is-invalid @enderror" value="{{ $user->no_unik }}" placeholder="NIM/NIP/NIDN" type="text">
                            @error('no_unik')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="gender" class="col-sm-12 col-md-2 col-form-label">{{ __('Jenis Kelamin') }}</label>
                        <div class="col-sm-12 col-md-10">
                            <select id="gender" class="custom-select form-control @error('gender') is-invalid @enderror" name="gender">
                                <option>{{ $user->gender }}</option>
                                <option value="Laki-laki" {{ old('gender') == 'Laki-laki' ? 'selected' : '' }}>{{ __('Laki-laki') }}</option>
                                <option value="Perempuan" {{ old('gender') == 'Perempuan' ? 'selected' : '' }}>{{ __('Perempuan') }}</option>
                            </select>
                            @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-12 col-md-2 col-form-label">Email</label>
                        <div class="col-sm-12 col-md-10">
                            <input id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $user->email }}" placeholder="email@example.com" type="email">
                            @error('email')
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
                                {{ __('Update') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-xl-6 mb-30">
            <div class="card-box height-100-p pd-20">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Update Password</h4>
                        <p class="mb-30">Form update password</p>
                    </div>
                </div>
                <form action="{{ route('user-updatePassword', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="password" class="col-sm-12 col-md-2 col-form-label">New Password</label>
                        <div class="col-sm-12 col-md-10">
                            <input id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="********" type="password" autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password-confirm" class="col-sm-12 col-md-2 col-form-label">Confirm Password</label>
                        <div class="col-sm-12 col-md-10">
                            <input id="password-confirm" name="password_confirmation" class="form-control" placeholder="********" type="password" autocomplete="new-password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12 col-md-2 col-form-label"></div>
                        <div class="col-sm-12 col-md-10">
                            <button type="submit" class="btn btn-lg btn-block btn-primary">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- Default Basic Forms End -->

<script>
    var notification = document.getElementById('notification');
    setTimeout(function() {
        notification.style.display = 'none';
    }, 5000);
</script>

@endsection