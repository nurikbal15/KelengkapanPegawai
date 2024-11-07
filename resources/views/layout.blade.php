<!DOCTYPE html>
<html lang="en">
<head>
    <title>@stack('title')</title>
    @include('part.head')
</head>
<body class="nav-fixed">
    @include('part.navbar')

    <!-- Cek apakah role pengguna adalah 'user' untuk mengatur tampilan tanpa sidebar -->
    @if(Auth::user()->hasRole('user'))
        <div id="layoutSidenav_content" style="margin-left: 0;">
            <main>
                @yield('content')
            </main>
            @include('part.footer')
        </div>
    @else
        <div id="layoutSidenav">
            @include('part.sidebar')
            <div id="layoutSidenav_content">
                <main>
                    @yield('content')
                </main>
                @include('part.footer')
            </div>
        </div>
    @endif

    @include('part.script')
</body>
</html>
