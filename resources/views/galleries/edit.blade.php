@extends('layouts.admin')

@section('title', 'Edit Galeri')

@section('content')

    <div class="card shadow">

        <div class="card-header bg-warning text-dark">

            <h4 class="mb-0">
                Edit Foto Galeri
            </h4>

        </div>

        <div class="card-body">

            <form action="{{ route('galleries.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <!-- Judul -->

                <div class="mb-3">

                    <label class="form-label">

                        Judul

                    </label>

                    <input type="text" name="judul" value="{{ old('judul', $gallery->judul) }}"
                        class="form-control @error('judul') is-invalid @enderror">

                    @error('judul')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <!-- Kategori -->

                <div class="mb-3">

                    <label class="form-label">

                        Kategori

                    </label>

                    <select name="kategori" class="form-select @error('kategori') is-invalid @enderror">

                        <option value="">Pilih Kategori</option>

                        <option value="Hotel" {{ old('kategori', $gallery->kategori) == 'Hotel' ? 'selected' : '' }}>
                            Hotel
                        </option>

                        <option value="Kamar" {{ old('kategori', $gallery->kategori) == 'Kamar' ? 'selected' : '' }}>
                            Kamar
                        </option>

                        <option value="Fasilitas"
                            {{ old('kategori', $gallery->kategori) == 'Fasilitas' ? 'selected' : '' }}>
                            Fasilitas
                        </option>

                        <option value="Restoran" {{ old('kategori', $gallery->kategori) == 'Restoran' ? 'selected' : '' }}>
                            Restoran
                        </option>

                        <option value="Lainnya" {{ old('kategori', $gallery->kategori) == 'Lainnya' ? 'selected' : '' }}>
                            Lainnya
                        </option>

                    </select>

                    @error('kategori')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <!-- Foto Saat Ini -->

                <div class="mb-3">

                    <label class="form-label">

                        Foto Saat Ini

                    </label>

                    <br>

                    @if ($gallery->foto)
                        <img src="{{ asset('uploads/gallery/' . $gallery->foto) }}" class="img-thumbnail" width="250"
                            id="preview">
                    @else
                        <img src="{{ asset('images/no-image.png') }}" class="img-thumbnail" width="250" id="preview">
                    @endif

                </div>

                <!-- Upload Baru -->

                <div class="mb-3">

                    <label class="form-label">

                        Ganti Foto

                        <small class="text-muted">

                            (Kosongkan jika tidak ingin mengganti)

                        </small>

                    </label>

                    <input type="file" name="foto" id="foto"
                        class="form-control @error('foto') is-invalid @enderror">

                    @error('foto')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <!-- Deskripsi -->

                <div class="mb-3">

                    <label class="form-label">

                        Deskripsi

                    </label>

                    <textarea name="deskripsi" rows="5" class="form-control">{{ old('deskripsi', $gallery->deskripsi) }}</textarea>

                </div>

                <button class="btn btn-primary">

                    <i class="bi bi-save"></i>

                    Update

                </button>

                <a href="{{ route('galleries.index') }}" class="btn btn-secondary">

                    Kembali

                </a>

            </form>

        </div>

    </div>

@endsection

@push('scripts')
    <script>
        document.getElementById('foto').addEventListener('change', function(e) {

            const file = e.target.files[0];

            if (file) {

                document.getElementById('preview').src = URL.createObjectURL(file);

            }

        });
    </script>
@endpush
