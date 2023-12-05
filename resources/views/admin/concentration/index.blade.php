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
                    <li class="breadcrumb-item active" aria-current="page">Data konsentrasi</li>
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
<div class="card-box mb-30">
    <div class="pd-20">
        <h4 class="text-blue h4">Data Konsentrasi</h4>
        <p class="mb-0">Daftar konsentrasi</p>
    </div>
    <div class="pb-20">
        <table class="data-table table stripe hover nowrap">
            <thead>
                <tr>
                    <th class="table-plus datatable-nosort">No</th>
                    <th>Konsentrasi</th>
                    <th class="datatable-nosort">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($concentration as $key => $item)
                <tr>
                    <td class="table-plus">{{ $key + 1 }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                        <div class="dropdown">
                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                <i class="dw dw-more"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                <a class="dropdown-item" href="{{ route('concentration-edit', $item->id) }}"><i class="dw dw-edit2"></i> Edit</a>
                                <form action="{{ route('concentration-delete', $item->id) }}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <button class="dropdown-item" type="submit">
                                        <i class="dw dw-delete-3"></i>Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    var notification = document.getElementById('notification');
    setTimeout(function() {
        notification.style.display = 'none';
    }, 5000);
</script>

@endsection