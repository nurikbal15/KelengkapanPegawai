@extends('layout')

@push('title')
    Daftar Pengguna
@endpush

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">{{ __('Pengguna') }}</h1>



        <!-- Users Table -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Pengguna</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <!-- Tambah User Button -->
                    <div class="mb-4">
                        <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm shadow-sm">
                            {{ __('Tambah Pengguna Baru') }}
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
                                    <td class="text-center">
                                        <a href="{{ route('users.edit', $user) }}" class="btn btn-info btn-sm mx-1">
                                            {{ __('Edit') }}
                                        </a>
                                        <form action="{{ route('users.destroy', $user) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm mx-1"
                                                onclick="return confirm('Are you sure?')">
                                                {{ __('Delete') }}
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
    </div>
@endsection
