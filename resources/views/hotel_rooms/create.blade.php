@extends('layouts.admin')

@section('title', 'Tambah Data Kamar')

@section('content')

    <div class="container-fluid">

        <div class="card shadow">

            <div class="card-header bg-primary text-white">

                <h4 class="mb-0">
                    Tambah Data Kamar Hotel
                </h4>

            </div>

            <div class="card-body">

                <form action="{{ route('hotel_rooms.store') }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="row">

                        <!-- ID KAMAR -->

                        <div class="col-md-6 mb-3">

                            <label class="form-label">

                                ID Kamar

                            </label>

                            <input type="text" name="id_kamar" value="{{ old('id_kamar') }}"
                                class="form-control @error('id_kamar') is-invalid @enderror">

                            @error('id_kamar')
                                <div class="invalid-feedback">

                                    {{ $message }}

                                </div>
                            @enderror

                        </div>

                        <!-- NOMOR KAMAR -->

                        <div class="col-md-6 mb-3">

                            <label class="form-label">

                                Nomor Kamar

                            </label>

                            <input type="text" name="nomor_kamar" value="{{ old('nomor_kamar') }}"
                                class="form-control @error('nomor_kamar') is-invalid @enderror">

                            @error('nomor_kamar')
                                <div class="invalid-feedback">

                                    {{ $message }}

                                </div>
                            @enderror

                        </div>

                    </div>

                    <div class="row">

                        <!-- NAMA -->

                        <div class="col-md-6 mb-3">

                            <label class="form-label">

                                Nama Kamar

                            </label>

                            <input type="text" name="nama_kamar" value="{{ old('nama_kamar') }}"
                                class="form-control @error('nama_kamar') is-invalid @enderror">

                            @error('nama_kamar')
                                <div class="invalid-feedback">

                                    {{ $message }}

                                </div>
                            @enderror

                        </div>

                        <!-- TIPE -->

                        <div class="col-md-6 mb-3">

                            <label class="form-label">

                                Tipe Kamar

                            </label>

                            <select name="tipe_kamar" class="form-select @error('tipe_kamar') is-invalid @enderror">

                                <option value="">Pilih Tipe</option>

                                <option value="Standard" {{ old('tipe_kamar') == 'Standard' ? 'selected' : '' }}>Standard
                                </option>
                                <option value="Superior" {{ old('tipe_kamar') == 'Superior' ? 'selected' : '' }}>Superior
                                </option>
                                <option value="Deluxe" {{ old('tipe_kamar') == 'Deluxe' ? 'selected' : '' }}>Deluxe</option>
                                <option value="Executive" {{ old('tipe_kamar') == 'Executive' ? 'selected' : '' }}>
                                    Executive
                                </option>
                                <option value="Junior Suite" {{ old('tipe_kamar') == 'Junior Suite' ? 'selected' : '' }}>
                                    Junior
                                    Suite</option>
                                <option value="Suite" {{ old('tipe_kamar') == 'Suite' ? 'selected' : '' }}>Suite</option>
                                <option value="Family" {{ old('tipe_kamar') == 'Family' ? 'selected' : '' }}>Family
                                </option>

                            </select>

                            @error('tipe_kamar')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>

                    <div class="row">

                        <!-- HARGA -->

                        <div class="col-md-6 mb-3">

                            <label class="form-label">

                                Harga per Malam

                            </label>

                            <input type="number" name="harga_per_malam" value="{{ old('harga_per_malam') }}"
                                class="form-control @error('harga_per_malam') is-invalid @enderror">

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

                            <textarea name="fasilitas" rows="4" class="form-control @error('fasilitas') is-invalid @enderror">{{ old('fasilitas') }}</textarea>

                            @error('fasilitas')
                                <div class="invalid-feedback">

                                    {{ $message }}

                                </div>
                            @enderror

                        </div>
                        <!-- KAPASITAS -->

                        <div class="col-md-6 mb-3">

                            <label class="form-label">

                                Kapasitas Orang

                                <input type="number" name="kapasitas_orang" value="{{ old('kapasitas_orang') }}"
                                    class="form-control @error('kapasitas_orang') is-invalid @enderror">

                                @error('kapasitas_orang')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                        </div>
                        <div class="row">

                            <!-- FOTO -->

                            <div class="mb-3">

                                <label class="form-label fw-semibold">
                                    Upload Foto
                                    <span class="text-danger">*</span>
                                </label>

                                <small class="d-block text-muted mb-2">
                                    Format yang diperbolehkan: <strong>JPG, JPEG, PNG</strong> • Maksimal ukuran
                                    <strong>2 MB</strong>.
                                </small>

                                <input type="file" name="foto" id="foto"
                                    class="form-control @error('foto') is-invalid @enderror" accept=".jpg,.jpeg,.png">

                                @error('foto')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                                <img id="preview" src="#" class="img-thumbnail mt-3"
                                    style="display:none;max-width:220px;">

                            </div>

                            <div class="mb-3">

                                <img id="preview" src="{{ asset('assets/images/no-image.jpg') }}" width="220"
                                    class="img-thumbnail">

                            </div>

                            <!-- STATUS -->

                            <div class="col-md-6 mb-3">

                                <label class="form-label">

                                    Status

                                </label>

                                <select name="status" class="form-select @error('status') is-invalid @enderror">

                                    <option value="">Pilih Status</option>

                                    <option value="Tersedia" {{ old('status') == 'Tersedia' ? 'selected' : '' }}>Tersedia
                                    </option>

                                    <option value="Terisi" {{ old('status') == 'Terisi' ? 'selected' : '' }}>Terisi
                                    </option>

                                    <option value="Cleaning" {{ old('status') == 'Cleaning' ? 'selected' : '' }}>Cleaning
                                    </option>

                                    <option value="Maintenance" {{ old('status') == 'Maintenance' ? 'selected' : '' }}>
                                        Maintenance</option>

                                </select>

                                @error('status')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                        </div>
                        <div class="row">

                            <div class="col-md-12 mb-3">

                                <label class="form-label">

                                    Deskripsi Kamar

                                </label>

                                <textarea name="deskripsi" rows="5" class="form-control">{{ old('deskripsi') }}</textarea>

                            </div>

                        </div>

                    </div>
                    <div class="mt-4">

                        <button type="submit" class="btn btn-primary">

                            <i class="bi bi-save"></i>

                            Simpan

                        </button>

                        <a href="{{ route('hotel_rooms.index') }}" class="btn btn-secondary">

                            <i class="bi bi-arrow-left"></i>

                            Kembali

                        </a>

                    </div>

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

                document.getElementById('preview').src =
                    URL.createObjectURL(file);

            }

        });
    </script>
@endpush
