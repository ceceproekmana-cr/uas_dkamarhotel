@extends('layouts.admin')

@section('title', 'Detail Pesan')

@section('content')

    <div class="card shadow">

        <div class="card-header bg-primary text-white">

            <h4>

                Detail Pesan

            </h4>

        </div>

        <div class="card-body">

            <table class="table">

                <tr>

                    <th width="180">

                        Nama

                    </th>

                    <td>

                        {{ $message->nama }}

                    </td>

                </tr>

                <tr>

                    <th>Email</th>

                    <td>

                        {{ $message->email }}

                    </td>

                </tr>

                <tr>

                    <th>Subjek</th>

                    <td>

                        {{ $message->subjek }}

                    </td>

                </tr>

                <tr>

                    <th>Pesan</th>

                    <td>

                        {!! nl2br(e($message->pesan)) !!}

                    </td>

                </tr>

                <tr>

                    <th>Status</th>

                    <td>

                        {{ $message->status }}

                    </td>

                </tr>

                <tr>

                    <th>Tanggal</th>

                    <td>

                        {{ $message->created_at->format('d F Y H:i') }}

                    </td>

                </tr>

            </table>

            <a href="{{ route('messages.index') }}" class="btn btn-secondary">

                Kembali

            </a>

        </div>

    </div>

@endsection
