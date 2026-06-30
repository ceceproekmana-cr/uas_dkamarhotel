@extends('layouts.app')

@section('title', 'Hotel Sejatera')

@section('content')

    <!-- HERO SECTION -->

    <section class="position-relative">

        <img src="{{ asset('assets/images/banner-hotel.jpg') }}" class="img-fluid w-100"
            style="height:650px;object-fit:cover;">

        <div class="position-absolute top-50 start-50 translate-middle text-center text-white">

            <h1 class="display-3 fw-bold">
                Welcome Home
            </h1>

            <p class="lead fs-2">
                Stay Comfortable, Feel Like Home
            </p>

            <div class="mt-4">

                <a href="{{ route('rooms') }}" class="btn btn-warning btn-lg">
                    Lihat Kamar
                </a>

                <a href="{{ route('contact') }}" class="btn btn-outline-light btn-lg ms-2">
                    Hubungi Kami
                </a>

            </div>

        </div>

    </section>

    <!-- FEATURED ROOMS -->

    <section id="rooms" class="py-5">

        <div class="container">

            <div class="text-center mb-5">

                <h2 class="fw-bold">

                    Featured Rooms

                </h2>

                <p class="text-muted">

                    Pilihan kamar terbaik kami

                </p>

            </div>

            <div class="row">

                @forelse($featuredRooms as $room)
                    <div class="col-lg-4 mb-4">

                        <div class="card shadow h-100 border-0">

                            @if ($room->foto)
                                <img src="{{ asset('uploads/hotel_rooms/' . $room->foto) }}" class="card-img-top"
                                    style="height:220px;object-fit:cover;" alt="{{ $room->nama_kamar }}">
                            @else
                                <img src="{{ asset('images/no-image.png') }}" class="card-img-top"
                                    style="height:220px;object-fit:cover;" alt="No Image">
                            @endif

                            <div class="card-body">

                                <h4>

                                    {{ $room->nama_kamar }}

                                </h4>

                                <span class="badge bg-primary">

                                    {{ $room->tipe_kamar }}

                                </span>

                                <h5 class="text-success mt-3">

                                    Rp {{ number_format($room->harga_per_malam, 0, ',', '.') }}

                                </h5>

                                <p>

                                    Kapasitas :
                                    {{ $room->kapasitas_orang }} Orang

                                </p>

                                <a href="{{ route('rooms.detail', $room->id) }}" class="btn btn-primary w-100">
                                    Pesan Sekarang
                                </a>

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="col-12">

                        <div class="alert alert-info">

                            Belum ada data kamar.

                        </div>

                    </div>
                @endforelse

            </div>

        </div>

    </section>

@endsection
