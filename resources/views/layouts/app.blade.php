<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Hotel Sejatera')</title>

    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.8-dist/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <!-- Tambahkan CSS ini -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">

        <div class="container">

            <a class="navbar-brand d-flex align-items-center fw-bold" href="{{ route('home') }}">

                <img src="{{ asset('assets/images/logo.png') }}" alt="Hotel Sejatera" width="90" height="90"
                    class="me-2">
                Hotel Sejatera
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">

                <span class="navbar-toggler-icon"></span>

            </button>

            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                            Beranda
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}"
                            href="{{ route('about') }}">
                            Tentang Kami
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('rooms') ? 'active' : '' }}"
                            href="{{ route('rooms') }}">
                            Daftar Tipe Kamar
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('gallery') ? 'active' : '' }}"
                            href="{{ route('gallery') }}">
                            Galeri
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('facilities') ? 'active' : '' }}"
                            href="{{ route('facilities') }}">
                            Fasilitas
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}"
                            href="{{ route('contact') }}">
                            Kontak
                        </a>
                    </li>

                    <li class="nav-item ms-3">
                        <a class="btn btn-light" href="{{ route('login') }}">
                            <i class="bi bi-box-arrow-in-right"></i>
                            Login Admin
                        </a>
                    </li>

                </ul>

            </div>

        </div>

    </nav>

    @yield('content')

    <footer class="bg-dark text-white text-center p-3 mt-5">

        © {{ date('Y') }} Hotel Sejatera

    </footer>

    <script src="{{ asset('bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @stack('scripts')

</body>

</html>
