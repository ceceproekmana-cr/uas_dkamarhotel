@extends('layouts.app')

@section('title', 'Detail Kamar')

@section('content')

    <section class="py-5">

        <div class="container">

            <div class="row">

                <div class="col-lg-6">

                    <img src="{{ asset('uploads/hotel_rooms/' . $room->foto) }}" class="img-fluid rounded shadow">

                </div>

                <div class="col-lg-6">

                    <h2 class="fw-bold">

                        {{ $room->nama_kamar }}

                    </h2>

                    <span class="badge bg-primary">

                        {{ $room->tipe_kamar }}

                    </span>

                    <hr>

                    <table class="table">

                        <tr>

                            <th width="180">

                                Nomor Kamar

                            </th>

                            <td>

                                {{ $room->nomor_kamar }}

                            </td>

                        </tr>

                        <tr>

                            <th>

                                Harga / Malam

                            </th>

                            <td>

                                Rp {{ number_format($room->harga_per_malam, 0, ',', '.') }}

                            </td>

                        </tr>

                        <tr>

                            <th>

                                Kapasitas

                            </th>

                            <td>

                                {{ $room->kapasitas_orang }} Orang

                            </td>

                        </tr>

                        <tr>

                            <th>

                                Status

                            </th>

                            <td>

                                @if ($room->status == 'Tersedia')
                                    <span class="badge bg-success">

                                        {{ $room->status }}

                                    </span>
                                @elseif($room->status == 'Terisi')
                                    <span class="badge bg-danger">

                                        {{ $room->status }}

                                    </span>
                                @elseif($room->status == 'Reserved')
                                    <span class="badge bg-warning text-dark">

                                        {{ $room->status }}

                                    </span>
                                @else
                                    <span class="badge bg-secondary">

                                        {{ $room->status }}

                                    </span>
                                @endif

                            </td>

                        </tr>

                        <tr>

                            <th>

                                Deskripsi

                            </th>

                            <td>

                                {{ $room->deskripsi }}

                            </td>

                        </tr>

                    </table>

                    <a href="{{ route('rooms') }}" class="btn btn-secondary">

                        ← Kembali

                    </a>

                    @if ($room->status == 'Tersedia')
                        <a href="{{ route('contact') }}" class="btn btn-primary">

                            Pesan Sekarang

                        </a>
                    @endif

                </div>

            </div>

        </div>

    </section>

@endsection
