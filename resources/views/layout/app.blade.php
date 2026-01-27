<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Website')</title>

    <!-- Bootstrap CSS ONLY -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>

    @include('partials.header')

    @include('partials.navbar')

    @yield('content')

    @include('partials.footer')

    @if(session('success'))
    <div class="toast-container position-fixed top-50 start-50 translate-middle" style="z-index:9999">
        <div class="toast show text-bg-dark shadow-lg rounded-3">
            <div class="toast-body text-center px-4 py-3">
                {{ session('success') }}
                <br>
                <a href="{{ url('/keranjang') }}" class="text-info fw-semibold text-decoration-none">
                    Cek Keranjang
                </a>
            </div>
        </div>
    </div>
    @endif


</body>

</html>