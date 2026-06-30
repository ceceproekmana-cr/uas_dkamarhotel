@extends('layouts.app')

@section('title', 'Tipe Kamar')

@section('content')

    <!-- Header -->

    <section class="bg-primary text-white py-5">

        <div class="container text-center">

            <h1 class="display-5 fw-bold">

                Our Rooms

            </h1>

            <p class="lead">

                Pilih tipe kamar yang sesuai dengan kebutuhan Anda.

            </p>

        </div>

    </section>

    <!-- Rooms -->

    <section class="py-5">

        <div class="container">

            <div class="row">

                @forelse($rooms as $room)
                    <div class="col-lg-4 col-md-6 mb-4">

                        <div class="card shadow border-0 h-100">

                            @if ($room->foto)
                                <img src="{{ asset('uploads/hotel_rooms/' . $room->foto) }}" class="card-img-top"
                                    style="height:300px;object-fit:cover;">
                            @else
                                <img src="{{ asset('uploads/no-image.png') }}" class="card-img-top"
                                    style="height:300px;object-fit:cover;">
                            @endif

                            <div class="card-body">

                                <h4 class="fw-bold">

                                    {{ $room->nama_kamar }}

                                </h4>

                                <span class="badge bg-primary">

                                    {{ $room->tipe_kamar }}

                                </span>

                                <hr>

                                <table class="table table-borderless table-sm">

                                    <tr>

                                        <td>Harga</td>

                                        <td>

                                            <strong>

                                                Rp {{ number_format($room->harga_per_malam, 0, ',', '.') }}

                                            </strong>

                                        </td>

                                    </tr>

                                    <tr>

                                        <td>Kapasitas</td>

                                        <td>

                                            {{ $room->kapasitas_orang }} Orang

                                        </td>

                                    </tr>

                                    <tr>

                                        <td>Bed</td>

                                        <td>

                                            {{ $room->jenis_bed }}

                                        </td>

                                    </tr>

                                    <tr>

                                        <td>Status</td>

                                        <td>

                                            @if ($room->status == 'Tersedia')
                                                <span class="badge bg-success">

                                                    {{ $room->status }}

                                                </span>
                                            @else
                                                <span class="badge bg-danger">

                                                    {{ $room->status }}

                                                </span>
                                            @endif

                                        </td>

                                    </tr>

                                </table>

                                <p class="text-muted">

                                    {{ \Illuminate\Support\Str::limit($room->deskripsi ?? '-', 100) }}
                                </p>

                                <a href="{{ route('rooms.detail', $room->id) }}" class="btn btn-primary w-100">

                                    View Detail

                                </a>

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="col-12">

                        <div class="alert alert-warning">

                            Belum ada data kamar.

                        </div>

                    </div>
                @endforelse

            </div>

            <div class="d-flex justify-content-center mt-4">

                <div class="d-flex justify-content-center mt-5">
                    {{ $rooms->links('pagination::bootstrap-5') }}
                </div>

            </div>

        </div>

    </section>

@endsection
