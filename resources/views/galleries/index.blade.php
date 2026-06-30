@extends('layouts.admin')
@php

    use Illuminate\Support\Str;

@endphp

@section('title', 'Galeri Hotel')

@section('content')

    <div class="card shadow">

        <div class="card-header bg-primary text-white">

            <div class="d-flex justify-content-between align-items-center">

                <h4 class="mb-0">

                    Data Galeri Hotel

                </h4>

                <a href="{{ route('galleries.create') }}" class="btn btn-light">

                    <i class="bi bi-plus-circle"></i>

                    Tambah Foto

                </a>

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

            <table class="table table-bordered table-striped align-middle" id="galleryTable">

                <thead class="table-dark">

                    <tr>

                        <th>No</th>

                        <th>Foto</th>

                        <th>Judul</th>

                        <th>Kategori</th>

                        <th>Deskripsi</th>

                        <th width="170">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach ($galleries as $gallery)
                        <tr>

                            <td>{{ $loop->iteration }}</td>

                            <td width="120">

                                @if ($gallery->foto)
                                    <img src="{{ asset('uploads/gallery/' . $gallery->foto) }}" width="90"
                                        height="70" class="img-thumbnail img-preview"
                                        style="object-fit:cover;cursor:pointer"
                                        data-image="{{ asset('uploads/gallery/' . $gallery->foto) }}">
                                @else
                                    <img src="{{ asset('images/no-image.png') }}" width="90" class="img-thumbnail">
                                @endif

                            </td>

                            <td>

                                {{ $gallery->judul }}

                            </td>

                            <td>

                                <span class="badge bg-info">

                                    {{ $gallery->kategori }}

                                </span>

                            </td>

                            <td>

                                {{ Str::limit($gallery->deskripsi, 50) }}

                            </td>

                            <td>

                                <a href="{{ route('galleries.edit', $gallery->id) }}" class="btn btn-warning btn-sm">

                                    <i class="bi bi-pencil-square"></i>

                                    Edit

                                </a>

                                <form action="{{ route('galleries.destroy', $gallery->id) }}" method="POST"
                                    class="d-inline delete-form">

                                    @csrf

                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm">

                                        <i class="bi bi-trash"></i>

                                        Delete

                                    </button>

                                </form>

                            </td>

                        </tr>
                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

    {{-- Modal Preview --}}

    <div class="modal fade" id="imageModal">

        <div class="modal-dialog modal-lg modal-dialog-centered">

            <div class="modal-content">

                <div class="modal-body p-2">

                    <img id="modalImage" class="img-fluid rounded">

                </div>

            </div>

        </div>

    </div>

@endsection
@push('scripts')
    <script>
        $(function() {

            $('#galleryTable').DataTable({

                pageLength: 10,

                responsive: true,

                language: {

                    search: "Cari :",

                    lengthMenu: "Tampilkan _MENU_ data",

                    zeroRecords: "Data tidak ditemukan",

                    info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data"

                }

            });

        });

        $('.delete-form').submit(function(e) {

            e.preventDefault();

            let form = this;

            Swal.fire({

                title: 'Hapus Data?',

                text: 'Data tidak dapat dikembalikan.',

                icon: 'warning',

                showCancelButton: true,

                confirmButtonColor: '#dc3545',

                confirmButtonText: 'Ya',

                cancelButtonText: 'Batal'

            }).then((result) => {

                if (result.isConfirmed) {

                    form.submit();

                }

            });

        });

        $('.img-preview').click(function() {

            $('#modalImage').attr('src', $(this).data('image'));

            $('#imageModal').modal('show');

        });
    </script>
@endpush
