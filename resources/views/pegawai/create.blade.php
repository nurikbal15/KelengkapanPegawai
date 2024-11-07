@extends('layout')

@push('title')
    Tambah Pegawai
@endpush

@section('content')
<header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
    <div class="container-xl px-4">
        <div class="page-header-content pt-4">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto mt-4">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i data-feather="user-plus"></i></div>
                        Tambah Pegawai
                    </h1>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main page content-->
<div class="container-xl px-4 mt-n10">
    <!-- Card for Nama and NIP -->
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>Informasi Pegawai</span>
            <button type="submit" form="pegawaiForm" class="btn btn-primary">
                <span class="text">{{ __('Simpan') }}</span>
            </button>
        </div>
        <div class="card-body">
            <form id="pegawaiForm" action="{{ route('pegawai.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Nama Field -->
                <div class="form-group mb-4">
                    <label for="nama" class="font-weight-bold text-gray-800">{{ __('Nama') }}</label>
                    <input id="nama" type="text" name="nama" class="form-control" required>
                    @error('nama')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- NIP Field -->
                <div class="form-group mb-4">
                    <label for="nip" class="font-weight-bold text-gray-800">{{ __('NIP') }}</label>
                    <input id="nip" type="text" name="nip" class="form-control" required>
                    @error('nip')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
        </div>
    </div>

    <!-- Card for Dokumen Fields -->
    <div class="card mb-4">
        <div class="card-header">Dokumen</div>
        <div class="card-body">
            <div class="row">
                @foreach(['sk_cpns', 'sk_pns', 'kk', 'akte', 'ktp', 'ijazah_sd', 'ijazah_smp', 'ijazah_sma', 'ijazah_kuliah'] as $dokumen)
                    <div class="col-md-6 mb-4">
                        <label for="{{ $dokumen }}" class="text-gray-800 font-weight-bold">{{ ucfirst(str_replace('_', ' ', $dokumen)) }}</label>
                        <div class="form-file">
                            <input type="file" class="form-file-input" id="{{ $dokumen }}" name="{{ $dokumen }}">
                            <label class="form-file-label" for="{{ $dokumen }}">
                            </label>
                        </div>
                        @error($dokumen)
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    </form>
</div>
@endsection

