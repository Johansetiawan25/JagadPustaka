<header class="bg-info py-3">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-md-3 navbar-brand fw-bold fs-5 text-primary">
                JAGADPUSTAKA
            </div>

            <div class="col-md-5">
                <input type="text" class="form-control" placeholder="Cari disini...">
            </div>

            <div class="col-md-4 text-end d-flex align-items-center justify-content-end gap-1">
                
                @if(Auth::check())
                <a href="/keranjang" class="btn btn-light position-relative">
                    <i class="bi bi-cart">&#x1F9FA</i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        {{ session('cart') ? count(session('cart')) : 0 }}
                    </span>
                </a>
                <!-- DROPDOWN USER -->
                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle d-flex align-items-center"
                        type="button"
                        id="dropdownUser"
                        data-bs-toggle="dropdown"
                        aria-expanded="false">

                        <i class="bi bi-person-circle fs-4 me-2"></i>
                        Selamat Datang,
                        <b class="ms-1">{{ Auth::user()->name }}</b>
                    </button>

                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownUser">
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger fw-semibold">
                                    <i class="bi bi-box-arrow-right me-2"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
                @else
                <!-- JIKA BELUM LOGIN -->
                <a href="{{ route('register') }}" class="btn btn-light btn-sm me-1">Daftar</a>
                <a href="{{ route('login') }}" class="btn btn-light btn-sm">Login</a>
                @endif
            </div>

        </div>

    </div>
    </div>
</header>