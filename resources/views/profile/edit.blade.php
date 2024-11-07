@extends('layout')

@push('title')
    Profile
@endpush

@section('content')
<header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
    <div class="container-xl px-4">
        <div class="page-header-content pt-4">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto mt-4">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i data-feather="user"></i></div>
                        Profile
                    </h1>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main page content-->
<div class="container-xl px-4 mt-n10">
    <div class="row">
        <div class="col-lg-6">
            <!-- Update Profile Information -->
            {{-- Uncomment if needed
            <div class="card mb-4">
                <div class="card-header">Update Profile Information</div>
                <div class="card-body">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>
            --}}

            <!-- Update Password -->
            <div class="card mb-4">
                <div class="card-header">Update Password</div>
                <div class="card-body">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Delete User Account -->
            <div class="card mb-4">
                <div class="card-header">Delete Account</div>
                <div class="card-body">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
