@extends('layouts.admin')

@section('title', 'Edit Data Kamar')

@section('content')

    <div class="container-fluid">

        <div class="card shadow">

            <div class="card-header bg-warning text-dark">

                <h4 class="mb-0">
                    Edit Data Kamar Hotel
                </h4>

            </div>

            <div class="card-body">

                <form action="{{ route('hotel_rooms.update', $hotelRoom->id) }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <div class="row">

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                ID Kamar
                            </label>

                            <input type="text" name="id_kamar" class="form-control"
                                value="{{ old('id_kamar', $hotelRoom->id_kamar) }}">

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Nomor Kamar
                            </label>

                            <input type="text" name="nomor_kamar" class="form-control"
                                value="{{ old('nomor_kamar', $hotelRoom->nomor_kamar) }}">

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Nama Kamar
                            </label>

                            <input type="text" name="nama_kamar" class="form-control"
                                value="{{ old('nama_kamar', $hotelRoom->nama_kamar) }}">

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Tipe Kamar
                            </label>

                            <select name="tipe_kamar" class="form-select">

                                @foreach (['Standard', 'Superior', 'Deluxe', 'Executive', 'Junior Suite', 'Suite', 'Family'] as $tipe)
                                    <option value="{{ $tipe }}"
                                        {{ $hotelRoom->tipe_kamar == $tipe ? 'selected' : '' }}>

                                        {{ $tipe }}

                                    </option>
                                @endforeach

                            </select>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Harga per Malam
                            </label>

                            <input type="number" name="harga_per_malam"
                                class="form-control @error('harga_per_malam') is-invalid @enderror"
                                value="{{ old('harga_per_malam', $hotelRoom->harga_per_malam) }}">

                            @error('harga_per_malam')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>
                        <div class="mb-3">

                            <label class="form-label">

                                Fasilitas

                            </label>

                            <textarea name="fasilitas" rows="4" class="form-control @error('fasilitas') is-invalid @enderror">{{ old('fasilitas', $hotelRoom->fasilitas) }}</textarea>

                            @error('fasilitas')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Kapasitas Orang
                            </label>

                            <input type="number" name="kapasitas_orang" class="form-control"
                                value="{{ old('kapasitas_orang', $hotelRoom->kapasitas_orang) }}">

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Status
                            </label>

                            <select name="status" class="form-select">

                                @foreach (['Tersedia', 'Terisi', 'Cleaning', 'Maintenance'] as $status)
                                    <option value="{{ $status }}"
                                        {{ $hotelRoom->status == $status ? 'selected' : '' }}>

                                        {{ $status }}

                                    </option>
                                @endforeach

                            </select>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">

                                Foto Saat Ini

                            </label>

                            <br>

                            <img id="preview"
                                src="{{ $hotelRoom->foto ? asset('uploads/hotel_rooms/' . $hotelRoom->foto) : asset('assets/images/no-image.png') }}"
                                class="img-thumbnail" width="220">

                        </div>

                        <div class="mb-3">

                            <label class="form-label">

                                Ganti Foto

                            </label>

                            <input type="file" name="foto" id="foto" class="form-control">

                        </div>

                    </div>



                    <div class="mb-3">

                        <label class="form-label">
                            Deskripsi
                        </label>

                        <textarea name="deskripsi" rows="5" class="form-control">{{ old('deskripsi', $hotelRoom->deskripsi) }}</textarea>

                    </div>

                    <hr>

                    <button type="submit" class="btn btn-warning">

                        <i class="bi bi-save"></i>

                        Update Data

                    </button>

                    <a href="{{ route('hotel_rooms.index') }}" class="btn btn-secondary">

                        <i class="bi bi-arrow-left"></i>

                        Kembali

                    </a>

                </form>

            </div>

        </div>

    </div>

@endsection
@push('scripts')
    <script>
        document.getElementById('foto').addEventListener('change', function(e) {

            const file = e.target.files[0];

            if (file) {

                preview.src = URL.createObjectURL(file);

            }

        });
    </script>
@endpush
