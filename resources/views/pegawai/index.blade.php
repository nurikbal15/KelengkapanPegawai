@extends('layout')

@push('title')
    Daftar Pegawai
@endpush

@push('custom-css')
    <!-- Tambahkan CSS custom jika diperlukan -->
@endpush

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">{{ __('Daftar Pegawai') }}</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ __('Daftar Pegawai') }}</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <!-- Tambah Pegawai Button -->
                    <div class="mb-4">
                        <a href="{{ route('pegawai.create') }}" class="btn btn-primary btn-sm shadow-sm">
                            {{ __('Tambah Pegawai') }}
                        </a>
                    </div>

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                                                <!-- Tanda centang -->
                                            @else
                                                <span class="text-danger font-weight-bold">&#10005;</span>
                                                <!-- Tanda silang -->
                                            @endif
                                        </td>
                                    @endforeach
                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Aksi">
                                            <a href="{{ route('pegawai.show', $data->id) }}"
                                                class="btn btn-info btn-sm mx-1">
                                                {{ __('Show') }}
                                            </a>
                                            <a href="{{ route('pegawai.downloadAll', $data->id) }}"
                                                class="btn btn-success btn-sm mx-1">
                                                {{ __('Unduh') }}
                                            </a>
                                            <form action="{{ route('pegawai.destroy', $data->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm mx-1"
                                                    onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                    {{ __('Delete') }}
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
    </div>
@endsection
