@extends('layout')

@push('title')
    Edit Pegawai
@endpush

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">{{ __('Edit Pegawai') }}</h1>

        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route('pegawai.update', $pegawai->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Nama Field -->
                    <div class="form-group mb-4">
                        <label for="nama" class="font-weight-bold text-gray-800">{{ __('Nama') }}</label>
                        <input id="nama" type="text" name="nama" class="form-control border-left-primary" value="{{ old('nama', $pegawai->nama) }}" required>
                        @error('nama')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- NIP Field -->
                    <div class="form-group mb-4">
                        <label for="nip" class="font-weight-bold text-gray-800">{{ __('NIP') }}</label>
                        <input id="nip" type="text" name="nip" class="form-control border-left-primary" value="{{ old('nip', $pegawai->nip) }}" required>
                        @error('nip')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Dokumen Fields -->
                    <h5 class="font-weight-bold text-gray-800 mb-3">{{ __('Dokumen') }}</h5>
                    <div class="row">
                        @foreach(['sk_cpns', 'sk_pns', 'kk', 'akte', 'ktp', 'ijazah_sd', 'ijazah_smp', 'ijazah_sma', 'ijazah_kuliah'] as $dokumen)
                            <div class="col-md-6 mb-4">
                                <label for="{{ $dokumen }}" class="text-gray-800 font-weight-bold">{{ ucfirst(str_replace('_', ' ', $dokumen)) }}</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="{{ $dokumen }}" name="{{ $dokumen }}">
                                    <label class="custom-file-label" for="{{ $dokumen }}">Pilih file...</label>
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

                    <!-- Submit Button -->
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-save"></i>
                            </span>
                            <span class="text">{{ __('Update') }}</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    // Update label file input ketika file dipilih
    document.querySelectorAll('.custom-file-input').forEach(input => {
        input.addEventListener('change', function() {
            const fileName = this.files[0] ? this.files[0].name : 'Pilih file...';
            this.nextElementSibling.textContent = fileName;
        });
    });
</script>
@endpush
