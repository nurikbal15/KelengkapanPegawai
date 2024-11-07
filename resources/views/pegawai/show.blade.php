@extends('layout')

@push('title')
    Detail Pegawai
@endpush

@section('content')
<header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
    <div class="container-xl px-4">
        <div class="page-header-content pt-4">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto mt-4">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i data-feather="user"></i></div>
                        Detail Pegawai
                    </h1>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main page content-->
<div class="container-xl px-4 mt-n10">
    <!-- Informasi Pegawai -->
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">{{ __('Informasi Pegawai') }}</h6>
            <div>
                @role('admin')

                <a href="{{ route('pegawai.index') }}" class="btn btn-secondary btn-sm shadow-sm me-2">
                    {{ __('Kembali') }}
                </a>

                @endrole
                <a href="{{ route('pegawai.edit', $pegawai->id) }}" class="btn btn-warning btn-sm shadow-sm">
                    {{ __('Edit') }}
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-sm-1 font-weight-bold">{{ __('NIP') }}</div>
                <div class="col-sm-9">{{ $pegawai->nip }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-1 font-weight-bold">{{ __('Nama') }}</div>
                <div class="col-sm-9">{{ $pegawai->nama }}</div>
            </div>
        </div>
    </div>

    <!-- Dokumen -->
    <div class="card mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ __('Dokumen') }}</h6>
        </div>
        <div class="card-body">
            <div class="row">
                @foreach(['sk_cpns', 'sk_pns', 'kk', 'akte', 'ktp', 'ijazah_sd', 'ijazah_smp', 'ijazah_sma', 'ijazah_kuliah'] as $dokumen)
                    <div class="col-sm-6 mb-3">
                        <div class="d-flex align-items-center">
                            <span class="font-weight-bold">{{ ucfirst(str_replace('_', ' ', $dokumen)) }}:</span>
                            <div class="ms-2">
                                @if($pegawai->$dokumen)
                                    <a href="{{ asset('storage/' . $pegawai->$dokumen) }}" target="_blank" class="text-primary">
                                        {{ __('Lihat') }}
                                    </a>
                                @else
                                    <span class="text-danger">{{ __('Tidak Tersedia') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
