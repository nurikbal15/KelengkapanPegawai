@extends('layout')

@push('title')
Edit User
@endpush

@section('content')
    <div class="container-fluid">
        <!-- Judul Halaman -->
        <h1 class="h3 mb-4 text-gray-800">{{ __('Edit Pengguna') }}</h1>

        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route('users.update', $user) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <!-- Kolom Kiri -->
                        <div class="col-md-6">
                            <!-- Nama Field -->
                            <div class="form-group">
                                <label for="name">{{ __('Nama') }}</label>
                                <input id="name" type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                                @error('name')
                                    <small class="text-danger mt-2">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- NIP Field -->
                            <div class="form-group">
                                <label for="nip">{{ __('NIP') }}</label>
                                <input id="nip" type="text" name="nip" class="form-control" value="{{ old('nip', $user->nip) }}" required>
                                @error('nip')
                                    <small class="text-danger mt-2">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Role Field -->
                            <div class="form-group">
                                <label for="role">{{ __('Peran') }}</label>
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
                            <div class="form-group">
                                <label for="password">{{ __('Password Baru') }}</label>
                                <input id="password" type="password" name="password" class="form-control">
                                @error('password')
                                    <small class="text-danger mt-2">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Konfirmasi Password Field -->
                            <div class="form-group">
                                <label for="password_confirmation">{{ __('Konfirmasi Paasword') }}</label>
                                <input id="password_confirmation" type="password" name="password_confirmation" class="form-control">
                                @error('password_confirmation')
                                    <small class="text-danger mt-2">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Tombol Simpan -->
                    <div class="text-right mt-4">
                        <button type="submit" class="btn btn-primary btn-sm">{{ __('Simpan Perubahan') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
