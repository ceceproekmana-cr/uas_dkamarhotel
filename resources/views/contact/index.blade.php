@extends('layouts.app')

@section('title', 'Kontak')

@section('content')

    <section class="bg-primary text-white py-5">

        <div class="container text-center">

            <h1 class="display-5 fw-bold">

                Hubungi Kami

            </h1>

            <p class="lead">

                Kami siap membantu Anda kapan saja

            </p>

        </div>

    </section>

    <section class="py-5">

        <div class="container">

            <div class="row">

                <!-- INFORMASI HOTEL -->

                <div class="col-lg-5 mb-4">

                    <div class="card shadow border-0 h-100">

                        <div class="card-body">

                            <h3 class="fw-bold">

                                Hotel Sejatera

                            </h3>

                            <hr>

                            <p>

                                <strong>Alamat</strong><br>

                                Jl. Wijaya I, Kebayoran Baru<br>

                                Jakarta Selatan, DKI Jakarta

                            </p>

                            <p>

                                <strong>Telepon</strong><br>

                                (+62) 856 7780 221

                            </p>

                            <p>

                                <strong>Email</strong><br>

                                info@hotelsejatera.com

                            </p>

                            <p>

                                <strong>Website</strong><br>

                                www.hotelsejatera.com

                            </p>

                        </div>

                    </div>

                </div>

                <!-- FORM -->

                <div class="col-lg-7">

                    <div class="card shadow border-0">

                        <div class="card-body">


                            <h3 class="mb-4">

                                Kirim Pesan

                            </h3>

                            <form action="{{ route('contact.store') }}" method="POST">

                                @csrf

                                <!-- Nama -->

                                <div class="mb-3">

                                    <label class="form-label">

                                        Nama

                                    </label>

                                    <input type="text" name="nama" value="{{ old('nama') }}"
                                        class="form-control @error('nama') is-invalid @enderror">

                                    @error('nama')
                                        <div class="invalid-feedback">

                                            {{ $message }}

                                        </div>
                                    @enderror

                                </div>

                                <!-- Email -->

                                <div class="mb-3">

                                    <label class="form-label">

                                        Email

                                    </label>

                                    <input type="email" name="email" value="{{ old('email') }}"
                                        class="form-control @error('email') is-invalid @enderror">

                                    @error('email')
                                        <div class="invalid-feedback">

                                            {{ $message }}

                                        </div>
                                    @enderror

                                </div>

                                <!-- Subjek -->

                                <div class="mb-3">

                                    <label class="form-label">

                                        Subjek

                                    </label>

                                    <input type="text" name="subjek" value="{{ old('subjek') }}"
                                        class="form-control @error('subjek') is-invalid @enderror">

                                    @error('subjek')
                                        <div class="invalid-feedback">

                                            {{ $message }}

                                        </div>
                                    @enderror

                                </div>

                                <!-- Pesan -->

                                <div class="mb-3">

                                    <label class="form-label">

                                        Pesan

                                    </label>

                                    <textarea name="pesan" rows="6" class="form-control @error('pesan') is-invalid @enderror">{{ old('pesan') }}</textarea>

                                    @error('pesan')
                                        <div class="invalid-feedback">

                                            {{ $message }}

                                        </div>
                                    @enderror

                                </div>

                                <button type="submit" class="btn btn-primary">

                                    <i class="bi bi-send-fill"></i>

                                    Kirim Pesan

                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

            <!-- GOOGLE MAP -->

            <div class="mt-5">

                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.145941171094!2d106.8106319747508!3d-6.244490193743856!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f1006607fc5d%3A0x24ccd7b849942504!2sAffanPlace!5e0!3m2!1sid!2sid!4v1782791574114!5m2!1sid!2sid"
                    width="100%" height="400" style="border:0;" loading="lazy" allowfullscreen=""
                    referrerpolicy="strict-origin-when-cross-origin">

                </iframe>

            </div>

        </div>

    </section>

@endsection
@push('scripts')

    @if (session('success'))
        <script>
            Swal.fire({

                icon: 'success',

                title: 'Pesan Berhasil',

                text: '{{ session('success') }}',

                timer: 2500,

                timerProgressBar: true,

                showConfirmButton: false,

                allowOutsideClick: false

            });
        </script>
    @endif

@endpush
