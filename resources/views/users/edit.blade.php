@extends('layout')

@push('title')
    Edit Pengguna
@endpush

@section('content')
<header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
    <div class="container-xl px-4">
        <div class="page-header-content pt-4">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto mt-4">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i data-feather="edit"></i></div>
                        Edit Pengguna
                    </h1>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main page content-->
<div class="container-xl px-4 mt-n10">
    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Form Edit Pengguna</h6>
            <!-- Tombol Simpan di Card Header -->
            <button type="submit" form="editUserForm" class="btn btn-primary">
                {{ __('Simpan Perubahan') }}
            </button>
        </div>
        <div class="card-body">
            <form id="editUserForm" action="{{ route('users.update', $user) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <!-- Kolom Kiri -->
                    <div class="col-md-6">
                        <!-- Nama Field -->
                        <div class="form-group mb-4">
                            <label for="name" class="font-weight-bold text-gray-800">{{ __('Nama') }}</label>
                            <input id="name" type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                            @error('name')
                                <small class="text-danger mt-2">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- NIP Field -->
                        <div class="form-group mb-4">
                            <label for="nip" class="font-weight-bold text-gray-800">{{ __('NIP') }}</label>
                            <input id="nip" type="text" name="nip" class="form-control" value="{{ old('nip', $user->nip) }}" required>
                            @error('nip')
                                <small class="text-danger mt-2">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Role Field -->
                        <div class="form-group mb-4">
                            <label for="role" class="font-weight-bold text-gray-800">{{ __('Peran') }}</label>
                            <select id="role" name="role" class="form-control" required>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                                        {{ ucfirst($role->name) }}
                                    </option>
                                @endforeach
                            </select>
                            @error('role')
                                <small class="text-danger mt-2">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <!-- Kolom Kanan -->
                    <div class="col-md-6">
                        <!-- Password Field -->
                        <div class="form-group mb-4">
                            <label for="password" class="font-weight-bold text-gray-800">{{ __('Password Baru') }}</label>
                            <input id="password" type="password" name="password" class="form-control">
                            @error('password')
                                <small class="text-danger mt-2">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Konfirmasi Password Field -->
                        <div class="form-group mb-4">
                            <label for="password_confirmation" class="font-weight-bold text-gray-800">{{ __('Konfirmasi Password') }}</label>
                            <input id="password_confirmation" type="password" name="password_confirmation" class="form-control">
                            @error('password_confirmation')
                                <small class="text-danger mt-2">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
