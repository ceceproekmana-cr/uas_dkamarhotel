<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <title>@yield('title')</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css">

    <style>
        body {
            background: #f5f6fa;
            overflow-x: hidden;
        }

        .sidebar {
            width: 230px;
            min-height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            background: #2d3250;
        }

        .sidebar .logo {
            color: #fff;
            font-size: 22px;
            font-weight: bold;
            text-align: center;
            padding: 25px;
            border-bottom: 1px solid rgba(255, 255, 255, .1);
        }

        .sidebar a {
            display: block;
            color: #d5d8e2;
            text-decoration: none;
            padding: 14px 25px;
            transition: .3s;
        }

        .sidebar a:hover {
            background: #40466b;
            color: #fff;
        }

        .sidebar a.active {
            background: #4f5d95;
            color: #fff;
        }

        .main {
            margin-left: 230px;
            min-height: 100vh;
            background: #f5f6fa;
        }

        .topbar {
            height: 70px;
            background: #fff;
            display: flex;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, .08);
        }

        .content {
            padding: 30px;
        }

        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, .08);
        }

        .dropdown-toggle::after {
            margin-left: 10px;
        }

        .dropdown-menu {
            border: none;
            border-radius: 12px;
        }

        .dropdown-item:hover {
            background: #f5f5f5;
        }
    </style>

</head>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@stack('scripts')

<body>

    <div class="sidebar">

        <div class="logo text-center py-4">

            <img src="{{ asset('assets/images/logo.png') }}" alt="Hotel Sejahtera" width="200" class="mb-2">

            <h4 class="fw-bold text-white mb-0">

                Hotel Sejatera

            </h4>

        </div>

        <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">

            <i class="bi bi-speedometer2"></i>

            Dashboard

        </a>

        <a href="{{ route('hotel_rooms.index') }}" class="{{ request()->routeIs('hotel_rooms.*') ? 'active' : '' }}">

            <i class="bi bi-building"></i>

            Data Kamar

        </a>

        <a href="{{ route('galleries.index') }}" class="{{ request()->routeIs('galleries.*') ? 'active' : '' }}">

            <i class="bi bi-images"></i>

            Galeri

        </a>

        <a href="{{ route('messages.index') }}" class="{{ request()->routeIs('messages.*') ? 'active' : '' }}">

            <i class="bi bi-envelope-paper-fill"></i>

            Pesan Masuk

        </a>
        <a href="{{ route('home') }}" target="_blank">

            <i class="bi bi-globe"></i>

            Website Hotel

        </a>


    </div>

    <div class="main">

        <nav class="navbar topbar px-4">

            <div class="container-fluid">

                <h4 class="mb-0 fw-bold">
                    @yield('title')
                </h4>

                @if (Auth::check())
                    <div class="dropdown">

                        <a href="#"
                            class="d-flex align-items-center text-decoration-none text-dark dropdown-toggle"
                            data-bs-toggle="dropdown">

                            <i class="bi bi-person-circle fs-2 me-2"></i>

                            <div>

                                <strong>{{ Auth::user()->username }}</strong>

                                <br>

                                <small class="text-muted">
                                    Administrator
                                </small>

                            </div>

                        </a>

                        <ul class="dropdown-menu dropdown-menu-end shadow">

                            <li>

                                <h6 class="dropdown-header">

                                    Login sebagai

                                    <br>

                                    <strong>{{ Auth::user()->username }}</strong>

                                </h6>

                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>

                                <form action="{{ route('logout') }}" method="POST">

                                    @csrf

                                    <button class="dropdown-item text-danger">

                                        <i class="bi bi-box-arrow-right"></i>

                                        Logout

                                    </button>

                                </form>

                            </li>

                        </ul>

                    </div>
                @endif

            </div>

        </nav>

        <div class="content">

            @yield('content')

        </div>

    </div>

</body>

</html>
