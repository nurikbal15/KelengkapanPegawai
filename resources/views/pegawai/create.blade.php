@extends('layout')

@push('title')
Tambah Pegawai
@endpush

@section('content')
    <div class="container-fluid">
        <!-- Judul Halaman -->
        <h1 class="h3 mb-4 text-gray-800">{{ __('Tambah Pegawai') }}</h1>

        <!-- Tombol Kembali -->
        <div class="d-flex justify-content-between mb-4">
            <a href="{{ route('pegawai.index') }}" class="btn btn-secondary btn-sm shadow-sm">
                {{ __('Kembali') }}
            </a>
        </div>

        <!-- Form Tambah Pegawai -->
        <div class="card shadow mb-4">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">{{ __('Form Tambah Pegawai') }}</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('pegawai.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Input Biasa -->
                    <div class="mb-4">
                        <!-- Nama Field -->
                        <div class="form-group">
                            <label for="nama">{{ __('Nama') }}</label>
                            <input id="nama" type="text" name="nama" class="form-control" required>
                            @error('nama')
                                <small class="text-danger mt-2">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- NIP Field -->
                        <div class="form-group">
                            <label for="nip">{{ __('NIP') }}</label>
                            <input id="nip" type="text" name="nip" class="form-control" required>
                            @error('nip')
                                <small class="text-danger mt-2">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <!-- Input Dokumen -->
                    <div class="mb-4">
                        <h6 class="font-weight-bold text-primary">{{ __('Dokumen') }}</h6>
                        @foreach(['sk_cpns', 'sk_pns', 'kk', 'akte', 'ktp', 'ijazah_sd', 'ijazah_smp', 'ijazah_sma', 'ijazah_kuliah'] as $dokumen)
                            <div class="form-group">
                                <label for="{{ $dokumen }}">{{ __(ucfirst(str_replace('_', ' ', $dokumen))) }}</label>
                                <div class="input-group">
                                    <input type="file" id="{{ $dokumen }}" name="{{ $dokumen }}" class="form-control-file d-none">
                                    <input type="text" class="form-control" placeholder="Pilih file..." readonly>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" onclick="document.getElementById('{{ $dokumen }}').click();">Pilih File</button>
                                    </div>
                                </div>
                                @error($dokumen)
                                    <small class="text-danger mt-2">{{ $message }}</small>
                                @enderror
                            </div>
                        @endforeach
                    </div>

                    <!-- Tombol Simpan -->
                    <div class="text-right mt-4">
                        <button type="submit" class="btn btn-primary btn-sm shadow-sm">{{ __('Simpan') }}</button>
                    </div>
                </form>
            </div>
        </div>
        
    </div>

    @push('scripts')
    <script>
        document.querySelectorAll('input[type="file"]').forEach(input => {
            input.addEventListener('change', function () {
                const fileName = this.files[0] ? this.files[0].name : 'Pilih file...';
                this.nextElementSibling.value = fileName;
            });
        });
    </script>
    @endpush
@endsection
