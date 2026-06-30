@extends('layouts.app')

@section('title', 'Galeri')

@section('content')

    <!-- HERO -->

    <section class="bg-primary text-white py-5">

        <div class="container text-center">

            <h1 class="display-5 fw-bold">
                Galeri Hotel
            </h1>

            <p class="lead">
                Dokumentasi fasilitas dan suasana Hotel Sejatera
            </p>

        </div>

    </section>

    <!-- GALLERY -->

    <section class="py-5">

        <div class="container">

            <div class="row g-4">

                @forelse($galleries as $gallery)
                    <div class="col-lg-4 col-md-6">

                        <div class="card shadow border-0 h-100">

                            <img src="{{ asset('uploads/gallery/' . $gallery->foto) }}" class="card-img-top"
                                style="height:250px;object-fit:cover;">

                            <div class="card-body">

                                <h5>{{ $gallery->judul }}</h5>

                                <span class="badge bg-primary">

                                    {{ $gallery->kategori }}

                                </span>

                                <p class="mt-3">

                                    {{ $gallery->deskripsi }}

                                </p>

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="col-12">

                        <div class="alert alert-info">

                            Belum ada foto galeri.

                        </div>

                    </div>
                @endforelse

            </div>

            <div class="mt-4 d-flex justify-content-center">

                {{ $galleries->links() }}

            </div>

        </div>

    </section>>

@endsection
