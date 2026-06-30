@extends('layouts.admin')

@section('title', 'Pesan Masuk')

@section('content')

    <div class="card shadow">

        <div class="card-header bg-primary text-white d-flex justify-content-between">

            <h4 class="mb-0">

                Data Pesan Masuk

            </h4>

        </div>

        <div class="card-body">

            @if (session('success'))
                <script>
                    Swal.fire({

                        icon: 'success',

                        title: 'Berhasil',

                        text: '{{ session('success') }}',

                        timer: 2000,

                        showConfirmButton: false

                    });
                </script>
            @endif

            <table class="table table-bordered table-striped" id="messageTable">

                <thead class="table-dark">

                    <tr>

                        <th>No</th>

                        <th>Nama</th>

                        <th>Email</th>

                        <th>Subjek</th>

                        <th>Status</th>

                        <th>Tanggal</th>

                        <th width="180">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach ($messages as $message)
                        <tr>

                            <td>{{ $loop->iteration }}</td>

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

                            <td>{{ $message->created_at->format('d-m-Y H:i') }}</td>

                            <td>

                                <a href="{{ route('messages.show', $message->id) }}" class="btn btn-info btn-sm">

                                    <i class="bi bi-eye"></i>

                                    Detail

                                </a>

                                <form action="{{ route('messages.destroy', $message->id) }}" method="POST"
                                    class="d-inline delete-form">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm">

                                        <i class="bi bi-trash"></i>

                                        Hapus

                                    </button>

                                </form>

                            </td>

                        </tr>
                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

@endsection

@push('scripts')
    <script>
        $('#messageTable').DataTable();

        $('.delete-form').submit(function(e) {

            e.preventDefault();

            let form = this;

            Swal.fire({

                title: 'Hapus pesan?',

                icon: 'warning',

                showCancelButton: true,

                confirmButtonText: 'Ya',

                cancelButtonText: 'Batal'

            }).then((result) => {

                if (result.isConfirmed) {

                    form.submit();

                }

            });

        });
    </script>
@endpush
