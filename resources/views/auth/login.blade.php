<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Login Admin - Hotel Sejatera</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.8-dist/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('bootstrap-icons/font/bootstrap-icons.css') }}">
</head>

<body class="bg-light">

    <div class="container">

        <div class="row justify-content-center align-items-center min-vh-100">

            <div class="col-lg-4 col-md-6">

                <div class="card shadow border-0">

                    <div class="card-header bg-primary text-white text-center py-3">

                        <h3 class="mb-0">

                            <i class="bi bi-building"></i>

                            Hotel Sejatera

                        </h3>

                        <small>Administrator Login</small>

                    </div>

                    <div class="card-body p-4">

                        @if (session('error'))
                            <div class="alert alert-danger">

                                {{ session('error') }}

                            </div>
                        @endif

                        <form action="{{ route('login.post') }}" method="POST">

                            @csrf

                            <div class="mb-3">

                                <label class="form-label">

                                    Username

                                </label>

                                <input type="text" name="username" value="{{ old('username') }}"
                                    class="form-control @error('username') is-invalid @enderror">

                                @error('username')
                                    <div class="invalid-feedback">

                                        {{ $message }}

                                    </div>
                                @enderror

                            </div>

                            <div class="mb-4">

                                <label class="form-label">

                                    Password

                                </label>

                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror">

                                @error('password')
                                    <div class="invalid-feedback">

                                        {{ $message }}

                                    </div>
                                @enderror

                            </div>

                            <button class="btn btn-primary w-100">

                                <i class="bi bi-box-arrow-in-right"></i>

                                Login

                            </button>

                        </form>

                    </div>

                    <div class="card-footer text-center text-muted">

                        © {{ date('Y') }} Hotel Sejatera

                    </div>

                </div>

            </div>

        </div>

    </div>

    <script src="{{ asset('bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>
