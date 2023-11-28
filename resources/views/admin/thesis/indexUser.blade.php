@extends('backend.master')
@section('content')
<div class="card-box mb-30">
    <div class="pd-20">
        <h4 class="text-blue h4">Tugas Akhir Ku</h4>
        <p class="mb-0">you can find more options <a class="text-primary" href="https://datatables.net/" target="_blank">Click Here</a></p>
    </div>
    <div class="pb-20">
        <table class="data-table table stripe hover nowrap">
            <thead>
                <tr>
                    <th class="table-plus datatable-nosort">Nama</th>
                    <th>NIM</th>
                    <th>Judul Penelitian</th>
                    <th>File</th>
                    <th class="datatable-nosort">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($thesisUser as $item)
                <tr>
                    <td class="table-plus">{{ $item->name }}</td>
                    <td>{{ $item->nim }}</td>
                    <td>{{ $item->title }}</td>
                    <td><a href="{{ asset('storage/'.$item->file) }}" target="_blank"><i class="icon-copy dw dw-file2"></i></a></td>
                    <td>
                        <div class="dropdown">
                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                <i class="dw dw-more"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                <a class="dropdown-item" href="{{ route('thesis-editUser', $item->id) }}"><i class="dw dw-edit2"></i> Edit</a>
                                <form action="{{ route('thesis-deleteUser', $item->id) }}" method="POST">
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
@endsection