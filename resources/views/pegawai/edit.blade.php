@extends('layout')

@push('title')
    Edit Pegawai
@endpush

@section('content')
<header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
    <div class="container-xl px-4">
        <div class="page-header-content pt-4">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto mt-4">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i data-feather="edit"></i></div>
                        Edit Pegawai
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
        <div class="card-header d-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Informasi Pegawai</h6>
            <!-- Tombol Update di Card Header -->
            <button type="submit" form="editPegawaiForm" class="btn btn-primary">
                {{ __('Simpan') }}
            </button>
        </div>
        <div class="card-body">
            <form id="editPegawaiForm" action="{{ route('pegawai.update', $pegawai->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Nama Field -->
                <div class="form-group mb-4">
                    <label for="nama" class="font-weight-bold text-gray-800">{{ __('Nama') }}</label>
                    <input id="nama" type="text" name="nama" class="form-control" value="{{ old('nama', $pegawai->nama) }}" required>
                    @error('nama')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- NIP Field -->
                <div class="form-group mb-4">
                    <label for="nip" class="font-weight-bold text-gray-800">{{ __('NIP') }}</label>
                    <input id="nip" type="text" name="nip" class="form-control" value="{{ old('nip', $pegawai->nip) }}" required>
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
                        @if($pegawai->$dokumen)
                            <small class="d-block mt-2 text-gray-600">
                                <span>{{ __('File saat ini:') }}</span>
                                <a href="{{ asset('storage/' . $pegawai->$dokumen) }}" target="_blank" class="text-primary">{{ __('Lihat') }}</a>
                            </small>
                        @endif
                        @error($dokumen)
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

