@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

    <div class="container-fluid">

        <h1 class="fw-bold mb-1">
            Dashboard
        </h1>

        <p class="text-muted mb-4">
            Selamat datang, Administrator
        </p>

        <div class="row">

            <div class="col-md-3">

                <div class="card border-0 shadow-sm bg-primary text-white">

                    <div class="card-body">

                        <h6>Total Kamar</h6>

                        <h2>{{ $totalRoom }}</h2>

                    </div>

                </div>

            </div>

            <div class="col-md-3">

                <div class="card border-0 shadow-sm bg-success text-white">

                    <div class="card-body">

                        <h6>Kamar Tersedia</h6>

                        <h2>{{ $availableRoom }}</h2>

                    </div>

                </div>

            </div>

            <div class="col-md-3">

                <div class="card border-0 shadow-sm bg-danger text-white">

                    <div class="card-body">

                        <h6>Kamar Terisi</h6>

                        <h2>{{ $occupiedRoom }}</h2>

                    </div>

                </div>

            </div>

            <div class="col-md-3">

                <div class="card border-0 shadow-sm bg-warning text-dark">

                    <div class="card-body">

                        <h6>Pesan Masuk</h6>

                        <h2>{{ $totalMessage }}</h2>

                    </div>

                </div>

            </div>

        </div>

        <div class="card shadow mt-4">

            <div class="card-header d-flex justify-content-between">

                <h5 class="mb-0">

                    5 Pesan Masuk Terbaru

                </h5>

                <a href="{{ route('messages.index') }}" class="btn btn-primary btn-sm">

                    Lihat Semua

                </a>

            </div>

            <div class="card-body">

                <table class="table table-striped align-middle">

                    <thead>

                        <tr>

                            <th>Nama</th>

                            <th>Email</th>

                            <th>Subjek</th>

                            <th>Status</th>

                            <th>Tanggal</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($latestMessages as $message)
                            <tr>

                                <td>{{ $message->nama }}</td>

                                <td>{{ $message->email }}</td>

                                <td>{{ $message->subjek }}</td>

                                <td>

                                    @if ($message->status == 'Belum Dibaca')
                                        <span class="badge bg-danger">

                                            {{ $message->status }}

                                        </span>
                                    @else
                                        <span class="badge bg-success">

                                            {{ $message->status }}

                                        </span>
                                    @endif

                                </td>

                                <td>

                                    {{ $message->created_at->format('d-m-Y') }}

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="5" class="text-center">

                                    Belum ada pesan.

                                </td>

                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

@endsection
