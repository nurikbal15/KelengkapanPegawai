@extends('layout')

@push('title')
    Daftar User yang Menunggu Konfirmasi
@endpush

@section('content')
<main>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="filter"></i></div>
                            Daftar Tunggu Pengguna
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main page content-->
    <div class="container-xl px-4 mt-n10">
        <div class="card mb-4">
            <div class="card-header">Extended DataTables</div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->nip }}</td>
                                <td>{{ $user->name }}</td>
                                <td>
                                    <div class="badge bg-warning text-white rounded-pill">Pending</div>
                                </td>
                                <td class="text-right">
                                    <form action="{{ route('admin.confirm_user', $user->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm me-2">Konfirmasi</button>
                                    </form>
                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card card-icon mb-4">
        </div>
    </div>
</main>
@endsection
