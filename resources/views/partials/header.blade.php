<header class="bg-info py-3">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-md-3 navbar-brand fw-bold fs-5 text-primary">
                JAGADPUSTAKA
            </div>

            <div class="col-md-6">
                <input type="text" class="form-control" placeholder="Cari disini...">
            </div>

            <div class="col-md-3 text-end">
                @if(Auth::check())
                    <!-- Jika sudah login -->
                    
                    <form method="POST" action="{{ route('logout') }}" style="display:inline">
                        @csrf
                        <button type="submit" class="btn btn-light btn-sm">Logout</button>
                    </form>
                @else
                    <!-- Jika belum login -->
                    <a href="#" class="btn btn-light btn-sm">Daftar</a>
                    <a href="{{ url('/login') }}" class="btn btn-light btn-sm">Login</a>
                @endif
            </div>

        </div>
    </div>
</header>
