@extends('layouts.admin')

@section('title', 'Data Kamar Hotel')

@section('content')

    <div class="card shadow">

        <div class="card-header bg-primary text-white">

            <div class="d-flex justify-content-between align-items-center">

                <h4 class="mb-0">

                    Data Kamar Hotel

                </h4>

                <div>

                    <a href="{{ route('hotel_rooms.create') }}" class="btn btn-light">

                        <i class="bi bi-plus-circle"></i>

                        Tambah Data

                    </a>

                    <a href="{{ route('hotel_rooms.export') }}" class="btn btn-danger">

                        <i class="bi bi-file-earmark-pdf"></i>

                        Export PDF

                    </a>

                </div>

            </div>

        </div>

        <div class="card-body">
            @if (session('success'))
                <script>
                    Swal.fire({

                        icon: 'success',

                        title: 'Berhasil',

                        text: '{{ session('success') }}',

                        timer: 1800,

                        showConfirmButton: false

                    });
                </script>
            @endif

            <table class="table table-bordered table-striped align-middle" id="hotelTable">

                <thead class="table-dark">

                    <tr>

                        <th>No</th>

                        <th>Foto</th>

                        <th>ID Kamar</th>

                        <th>Nomor</th>

                        <th>Nama</th>

                        <th>Tipe</th>

                        <th>Harga</th>

                        <th>Fasilitas</th>

                        <th>Status</th>

                        <th>Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach ($hotelRooms as $room)
                        <tr>

                            <td>{{ $loop->iteration }}</td>

                            <td width="120">

                                @if ($room->foto)
                                    <img src="{{ asset('uploads/hotel_rooms/' . $room->foto) }}"
                                        class="img-thumbnail img-preview" width="80" height="60"
                                        style="object-fit:cover;cursor:pointer;"
                                        data-image="{{ asset('uploads/hotel_rooms/' . $room->foto) }}">
                                @else
                                    <img src="{{ asset('assets/images/no-image.png') }}" class="img-thumbnail"
                                        width="80">
                                @endif

                            </td>

                            <td>{{ $room->id_kamar }}</td>

                            <td>{{ $room->nomor_kamar }}</td>

                            <td>{{ $room->nama_kamar }}</td>

                            <td>

                                <span class="badge bg-info">

                                    {{ $room->tipe_kamar }}

                                </span>

                            </td>

                            <td>

                                Rp {{ number_format($room->harga_per_malam, 0, ',', '.') }}

                            </td>

                            <td>

                                {{ \Illuminate\Support\Str::limit($room->fasilitas, 40) }}

                            </td>

                            <td>

                                @if ($room->status == 'Tersedia')
                                    <span class="badge bg-success">

                                        {{ $room->status }}

                                    </span>
                                @elseif($room->status == 'Reserved')
                                    <span class="badge bg-warning text-dark">

                                        {{ $room->status }}

                                    </span>
                                @elseif($room->status == 'Terisi')
                                    <span class="badge bg-danger">

                                        {{ $room->status }}

                                    </span>
                                @else
                                    <span class="badge bg-secondary">

                                        {{ $room->status }}

                                    </span>
                                @endif

                            </td>

                            <td>

                                <a href="{{ route('hotel_rooms.edit', $room->id) }}" class="btn btn-warning btn-sm">

                                    <i class="bi bi-pencil-square"></i>

                                    Edit

                                </a>

                                <form id="delete-form-{{ $room->id }}"
                                    action="{{ route('hotel_rooms.destroy', $room->id) }}" method="POST" class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button type="button" class="btn btn-danger btn-sm btn-delete"
                                        data-id="{{ $room->id }}">

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
    <!-- Modal Preview Gambar -->

    <div class="modal fade" id="imageModal" tabindex="-1">

        <div class="modal-dialog modal-lg modal-dialog-centered">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title">

                        Preview Foto Kamar

                    </h5>

                    <button class="btn-close" data-bs-dismiss="modal">
                    </button>

                </div>

                <div class="modal-body text-center">

                    <img id="modalImage" class="img-fluid rounded">

                </div>

            </div>

        </div>

    </div>

@endsection

@push('scripts')
    <script>
        $(document).ready(function() {

            $('#hotelTable').DataTable({

                responsive: true,

                pageLength: 10,

                order: [
                    [1, 'asc']
                ],

                language: {

                    search: "🔍 Cari :",

                    lengthMenu: "Tampilkan _MENU_ data",

                    zeroRecords: "Data tidak ditemukan",

                    info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",

                    infoEmpty: "Tidak ada data"

                }

            });

            // ============================
            // SweetAlert Delete
            // ============================

            $('.btn-delete').click(function() {

                let id = $(this).data('id');

                Swal.fire({

                    title: 'Hapus Data?',

                    text: 'Data yang dihapus tidak dapat dikembalikan!',

                    icon: 'warning',

                    showCancelButton: true,

                    confirmButtonColor: '#dc3545',

                    cancelButtonColor: '#6c757d',

                    confirmButtonText: 'Ya, Hapus',

                    cancelButtonText: 'Batal'

                }).then((result) => {

                    if (result.isConfirmed) {

                        $('#delete-form-' + id).submit();

                    }

                });

            });

            // ============================
            // Preview Gambar
            // ============================

            $('.img-preview').click(function() {

                $('#modalImage').attr('src', $(this).data('image'));

                $('#imageModal').modal('show');

            });

        });
    </script>
@endpush
