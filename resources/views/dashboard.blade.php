@extends('layout')

@push('title')
    Overview
@endpush

@section('content')
<header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
    <div class="container-xl px-4">
        <div class="page-header-content pt-4">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto mt-4">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i data-feather="activity"></i></div>
                        Dashboard
                    </h1>
                </div>
                <div class="col-12 col-xl-auto mt-4">
                    <div class="input-group input-group-joined border-0" style="width: 16.5rem; background-color: white;">
                        <span class="input-group-text" style="background-color: white;"><i class="text-primary" data-feather="calendar"></i></span>
                        <input type="text" class="form-control ps-0 pointer" id="realtimeClock" placeholder="Current date and time..." readonly style="background-color: white;" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Main page content-->
<div class="container-xl px-4 mt-n10">
    <!-- Example Colored Cards for Dashboard Demo-->
    <div class="row">
        <div class="col-lg-6 col-xl-3 mb-4">
            <div class="card bg-primary text-white h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="me-3">
                            <div class="text-white-75 small">Total Pegawai</div>
                            <div class="text-lg fw-bold">{{ $pegawaiCount }}</div> <!-- Menampilkan jumlah pegawai -->
                        </div>
                        <i class="feather-xl text-white-50" data-feather="users"></i> <!-- Menggunakan ikon "users" -->
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between small">
                    <a class="text-white stretched-link" href="{{ route('pegawai.index') }}">Lihat Pegawai</a>
                    <div class="text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-xl-3 mb-4">
            <div class="card bg-warning text-white h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="me-3">
                            <div class="text-white-75 small">Total Pengguna</div>
                            <div class="text-lg fw-bold">{{ $userCount }}</div> <!-- Menampilkan jumlah pengguna -->
                        </div>
                        <i class="feather-xl text-white-50" data-feather="users"></i> <!-- Menggunakan ikon "users" -->
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between small">
                    <a class="text-white stretched-link" href="{{ route('users.index') }}">Lihat Pengguna</a> <!-- Mengarah ke route users.index -->
                    <div class="text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-xl-3 mb-4">
            <div class="card bg-danger text-white h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="me-3">
                            <div class="text-white-75 small">Pengguna Menunggu Konfirmasi</div>
                            <div class="text-lg fw-bold">{{ $unconfirmedUserCount }}</div> <!-- Menampilkan jumlah pengguna menunggu konfirmasi -->
                        </div>
                        <i class="feather-xl text-white-50" data-feather="user-check"></i> <!-- Menggunakan ikon "user-check" -->
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between small">
                    <a class="text-white stretched-link" href="{{ route('admin.unconfirmed_users') }}">Lihat Permintaan</a> <!-- Mengarah ke route admin.unconfirmed_users -->
                    <div class="text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

    </div>
    <!-- Example Charts for Dashboard Demo-->

    <script>
        function updateClock() {
            const now = new Date();
            const options = {
                weekday: 'short', year: 'numeric', month: 'short', day: 'numeric',
                hour: '2-digit', minute: '2-digit'
            };
            document.getElementById('realtimeClock').value = now.toLocaleDateString('en-US', options);
        }

        document.addEventListener('DOMContentLoaded', function() {
            updateClock(); // Update immediately when page loads
            setInterval(updateClock, 1000); // Update every second
        });
    </script>
</div>
@endsection
