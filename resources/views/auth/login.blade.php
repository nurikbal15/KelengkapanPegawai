<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Halaman Login" />
    <meta name="author" content="YourAppName" />
    <title>Login - KEJAKSAAN NEGERI LHOKSEUMAWE</title>
    <link href="{{ asset('assets/css/styles1.css') }}" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}" />
    <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.24.1/feather.min.js" crossorigin="anonymous"></script>
</head>
<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header justify-content-center">
                                    <h3 class="font-weight-light my-4">Masuk</h3>
                                </div>
                                <div class="card-body">
                                    <!-- Tampilkan Status Sesi -->
                                    <x-auth-session-status class="mb-4" :status="session('status')" />

                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <!-- Input NIP -->
                                        <div class="form-group">
                                            <label class="small mb-1" for="nip">NIP</label>
                                            <input class="form-control py-4" id="nip" type="text" name="nip" placeholder="Masukkan NIP" value="{{ old('nip') }}" required autofocus />
                                            @error('nip')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <!-- Input Password -->
                                        <div class="form-group">
                                            <label class="small mb-1" for="password">Kata Sandi</label>
                                            <input class="form-control py-4" id="password" type="password" name="password" placeholder="Masukkan kata sandi" required />
                                            @error('password')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <!-- Checkbox Remember Me -->
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" id="remember_me" type="checkbox" name="remember" />
                                                <label class="custom-control-label" for="remember_me">Ingat Saya</label>
                                            </div>
                                        </div>

                                        <!-- Tombol Login -->
                                        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                            @if (Route::has('password.request'))
                                                <a class="small" href="{{ route('password.request') }}">Lupa Kata Sandi?</a>
                                            @endif
                                            <button type="submit" class="btn btn-primary">Masuk</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="small">
                                        <a href="{{ route('register') }}">Belum punya akun? Daftar di sini!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="footer mt-auto footer-dark">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 small">Hak Cipta &copy; Website Anda 2023</div>
                        <div class="col-md-6 text-md-right small">
                            <a href="#!">Kebijakan Privasi</a>
                            &middot;
                            <a href="#!">Syarat & Ketentuan</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
</body>
</html>
