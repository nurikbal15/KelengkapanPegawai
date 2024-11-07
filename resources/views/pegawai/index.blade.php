@role('admin')
@extends('layout')

@push('title')
    Daftar Pegawai
@endpush

@section('content')
<header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
    <div class="container-xl px-4">
        <div class="page-header-content pt-4">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto mt-4">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i data-feather="users"></i></div>
                        Daftar Pegawai
                    </h1>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main page content-->
<div class="container-xl px-4 mt-n10">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span class="font-weight-bold">{{ __('Daftar Pegawai') }}</span>
            <!-- Tambah Pegawai Button -->
            <a href="{{ route('pegawai.create') }}" class="btn btn-primary btn-sm shadow-sm">
                {{ __('Tambah Pegawai') }}
            </a>
        </div>
        <div class="card-body">
            <!-- Success Message -->
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Pegawai Table -->
            <table id="datatablesSimple" class="table table-bordered">
                <thead>
                    <tr>
                        <th>NIP</th>
                        <th>Nama</th>
                        @foreach (['sk_cpns', 'sk_pns', 'kk', 'akte', 'ktp', 'ijazah_sd', 'ijazah_smp', 'ijazah_sma', 'ijazah_kuliah'] as $dokumen)
                            <th>{{ ucfirst(str_replace('_', ' ', $dokumen)) }}</th>
                        @endforeach
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pegawai as $data)
                        <tr>
                            <td>{{ $data->nip }}</td>
                            <td>{{ $data->nama }}</td>
                            @foreach (['sk_cpns', 'sk_pns', 'kk', 'akte', 'ktp', 'ijazah_sd', 'ijazah_smp', 'ijazah_sma', 'ijazah_kuliah'] as $dokumen)
                                <td class="text-center">
                                    @if ($data->$dokumen)
                                        <span class="text-success font-weight-bold">&#10003;</span>
                                    @else
                                        <span class="text-danger font-weight-bold">&#10005;</span>
                                    @endif
                                </td>
                            @endforeach
                            <td class="text-right">
                                <div class="btn-group" role="group">
                                    <a href="{{ route('pegawai.show', $data->id) }}" class="btn btn-secondary btn-sm">
                                        View
                                    </a>
                                    <a href="{{ route('pegawai.downloadAll', $data->id) }}" class="btn btn-success btn-sm">
                                        Unduh
                                    </a>
                                    <form action="{{ route('pegawai.destroy', $data->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin ingin menghapus data ini?')">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@endrole
