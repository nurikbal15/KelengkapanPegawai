@extends('layout')

@push('title')
    Tambah Pengguna
@endpush

@section('content')
<header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
    <div class="container-xl px-4">
        <div class="page-header-content pt-4">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto mt-4">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i data-feather="user-plus"></i></div>
                        Tambah Pengguna
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
            <h6 class="m-0 font-weight-bold text-primary">{{ __('Form Tambah Pengguna') }}</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('users.store') }}" method="POST">
                @csrf

                <div class="row">
                    <!-- Kolom Kiri -->
                    <div class="col-md-6">
                        <!-- Name Field -->
                        <div class="form-group mb-4">
                            <label for="name" class="font-weight-bold text-gray-800">{{ __('Nama') }}</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- NIP Field -->
                        <div class="form-group mb-4">
                            <label for="nip" class="font-weight-bold text-gray-800">{{ __('NIP') }}</label>
                            <input type="text" id="nip" name="nip" class="form-control" value="{{ old('nip') }}" required>
                            @error('nip')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Role Selection Field -->
                        <div class="form-group mb-4">
                            <label for="role" class="font-weight-bold text-gray-800">{{ __('Role') }}</label>
                            <select id="role" name="role" class="form-control" required>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}">{{ ucfirst($role->name) }}</option>
                                @endforeach
                            </select>
                            @error('role')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <!-- Kolom Kanan -->
                    <div class="col-md-6">
                        <!-- Password Field -->
                        <div class="form-group mb-4">
                            <label for="password" class="font-weight-bold text-gray-800">{{ __('Password') }}</label>
                            <input type="password" id="password" name="password" class="form-control" required>
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Confirm Password Field -->
                        <div class="form-group mb-4">
                            <label for="password_confirmation" class="font-weight-bold text-gray-800">{{ __('Confirm Password') }}</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                            @error('password_confirmation')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="text-right mt-4">
                    <button type="submit" class="btn btn-primary">
                        <span class="text">{{ __('Tambahkan Pengguna') }}</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
