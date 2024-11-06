@extends('layout')

@push('title')
Tambah Pengguna
@endpush

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">{{ __('Tambah Pengguna') }}</h1>

        <!-- Form Card -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">{{ __('Tambah Pengguna') }}</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <!-- Kolom Kiri -->
                        <div class="col-md-6">
                            <!-- Name Field -->
                            <div class="form-group">
                                <label for="name">{{ __('Nama') }}</label>
                                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- NIP Field -->
                            <div class="form-group">
                                <label for="nip">{{ __('NIP') }}</label>
                                <input type="text" id="nip" name="nip" class="form-control" value="{{ old('nip') }}" required>
                                @error('nip')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Role Selection Field -->
                            <div class="form-group">
                                <label for="role">{{ __('Role') }}</label>
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
                            <div class="form-group">
                                <label for="password">{{ __('Password') }}</label>
                                <input type="password" id="password" name="password" class="form-control" required>
                                @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Confirm Password Field -->
                            <div class="form-group">
                                <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                                @error('password_confirmation')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="form-group text-right mt-3">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Tambahkan Pengguna') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
