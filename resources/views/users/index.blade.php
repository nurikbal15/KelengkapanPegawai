@extends('layout')

@push('title')
    Daftar Pengguna
@endpush

@section('content')
<header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
    <div class="container-xl px-4">
        <div class="page-header-content pt-4">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto mt-4">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i data-feather="users"></i></div>
                        Daftar Pengguna
                    </h1>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main page content-->
<div class="container-xl px-4 mt-n10">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span class="font-weight-bold">Daftar Pengguna</span>
            <!-- Tambah User Button -->
            <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm shadow-sm">
                {{ __('Tambah Pengguna Baru') }}
            </a>
        </div>
        <div class="card-body">
            <!-- Success Message -->
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Users Table -->
            <table id="datatablesSimple" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>NIP</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->nip }}</td>
                            <td>{{ $user->getRoleNames()->join(', ') }}</td>
                            <td class="text-right">
                                <a href="{{ route('users.edit', $user) }}" class="btn btn-info btn-sm me-1">
                                    Edit
                                </a>
                                <form action="{{ route('users.destroy', $user) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm me-1"
                                            onclick="return confirm('Are you sure?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
