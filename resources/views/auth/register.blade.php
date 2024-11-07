<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Halaman Pendaftaran">
    <meta name="author" content="YourAppName">
    <title>Daftar - KEJAKSAAN NEGERI LHOKSEUMAWE</title>
    <link href="{{ asset('assets/css/styles1.css') }}" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">
    <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.24.1/feather.min.js" crossorigin="anonymous"></script>
</head>
<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header justify-content-center">
                                    <h3 class="font-weight-light my-4">Buat Akun</h3>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="form-row">
                                            <div class="col-md-12 mb-3">
                                                <label class="small mb-1" for="name">Nama</label>
                                                <input type="text" id="name" name="name" class="form-control py-4" placeholder="Masukkan nama Anda" value="{{ old('name') }}" required autofocus>
                                                @error('name')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-12 mb-3">
                                                <label class="small mb-1" for="nip">NIP</label>
                                                <input type="text" id="nip" name="nip" class="form-control py-4" placeholder="Masukkan NIP Anda" value="{{ old('nip') }}" required>
                                                @error('nip')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6 mb-3">
                                                <label class="small mb-1" for="password">Kata Sandi</label>
                                                <input type="password" id="password" name="password" class="form-control py-4" placeholder="Masukkan kata sandi" required>
                                                @error('password')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="small mb-1" for="password_confirmation">Konfirmasi Kata Sandi</label>
                                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control py-4" placeholder="Konfirmasi kata sandi" required>
                                                @error('password_confirmation')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group mt-4 mb-0">
                                            <button type="submit" class="btn btn-primary btn-block">Buat Akun</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="small">
                                        <a href="{{ route('login') }}">Sudah punya akun? Masuk di sini</a>
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
                            <a href="#!">Syarat &amp; Ketentuan</a>
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
