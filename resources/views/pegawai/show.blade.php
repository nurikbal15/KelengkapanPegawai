@extends('layout')

@push('title')
Detail Pegawai
@endpush

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">{{ __('Detail Pegawai') }}</h1>

        <!-- Tombol Kembali -->
        <div class="d-flex justify-content-between mb-4">
            @role('admin')
                <a href="{{ route('pegawai.index') }}" class="btn btn-secondary btn-sm shadow-sm">
                    {{ __('Kembali') }}
                </a>
            @endrole
        </div>

        <!-- Informasi Pegawai -->
        <div class="card shadow mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">{{ __('Informasi Pegawai') }}</h6>
                <a href="{{ route('pegawai.edit', $pegawai->id) }}" class="btn btn-warning btn-sm shadow-sm">
                    {{ __('Edit') }}
                </a>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-sm-3 font-weight-bold">{{ __('NIP') }}</div>
                    <div class="col-sm-9">{{ $pegawai->nip }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3 font-weight-bold">{{ __('Nama') }}</div>
                    <div class="col-sm-9">{{ $pegawai->nama }}</div>
                </div>
            </div>
        </div>

        <!-- Dokumen -->
        <div class="card shadow">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ __('Dokumen') }}</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach(['sk_cpns', 'sk_pns', 'kk', 'akte', 'ktp', 'ijazah_sd', 'ijazah_smp', 'ijazah_sma', 'ijazah_kuliah'] as $dokumen)
                        <div class="col-sm-6 mb-3">
                            <div class="d-flex align-items-center">
                                <span class="font-weight-bold">{{ ucfirst(str_replace('_', ' ', $dokumen)) }}:</span>
                                <div class="ml-2">
                                    @if($pegawai->$dokumen)
                                        <a href="{{ asset('storage/' . $pegawai->$dokumen) }}" target="_blank" class="text-primary ml-2">
                                            {{ __('Lihat') }}
                                        </a>
                                    @else
                                        <span class="text-danger ml-2">{{ __('Tidak Tersedia') }}</span>
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
