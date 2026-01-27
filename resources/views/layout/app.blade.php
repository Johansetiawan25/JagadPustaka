<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Website')</title>

    <!-- Bootstrap CSS ONLY -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">


</head>

<body>

    @include('partials.header')

    @include('partials.navbar')

    @yield('content')

    @include('partials.footer')

    @if(session('success'))
    <div class="toast-container position-fixed top-50 start-50 translate-middle" style="z-index:9999">
        <div class="toast text-bg-dark shadow-lg rounded-3" id="success-toast">
            <div class="toast-body text-center px-4 py-3 position-relative">
                {{ session('success') }}
                <br>
                <a href="{{ url('/keranjang') }}" class="text-info fw-semibold text-decoration-none">
                    Cek Keranjang
                </a>

                {{-- Tombol close --}}
                <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-2" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toastEl = document.getElementById('success-toast');
            if (toastEl) {
                const toast = new bootstrap.Toast(toastEl);
                toast.show();

                setTimeout(() => {
                    toast.hide(); // hilangkan toast setelah 2 detik
                }, 3000); // 2000ms
            }
        });
    </script>
    @endif


</body>

</html>