@extends('layouts.admin')

@section('title', 'Tambah Galeri')

@section('content')

    <div class="card shadow">

        <div class="card-header bg-primary text-white">

            <h4 class="mb-0">

                Tambah Foto Galeri

            </h4>

        </div>

        <div class="card-body">

            <form action="{{ route('galleries.store') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="mb-3">

                    <label class="form-label">

                        Judul

                    </label>

                    <input type="text" name="judul" value="{{ old('judul') }}"
                        class="form-control @error('judul') is-invalid @enderror">

                    @error('judul')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="mb-3">

                    <label class="form-label">

                        Kategori

                    </label>

                    <select name="kategori" class="form-select @error('kategori') is-invalid @enderror">

                        <option value="">Pilih Kategori</option>

                        <option>Hotel</option>

                        <option>Kamar</option>

                        <option>Fasilitas</option>

                        <option>Restoran</option>

                        <option>Lainnya</option>

                    </select>

                    @error('kategori')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="mb-3">

                    <label class="form-label">

                        Upload Foto

                        <small class="text-muted">

                            (JPG, JPEG, PNG | Maksimal 2 MB)

                        </small>

                    </label>

                    <input type="file" name="foto" id="foto"
                        class="form-control @error('foto') is-invalid @enderror">

                    @error('foto')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                    <img id="preview" class="img-thumbnail mt-3" width="250" style="display:none;">

                </div>

                <div class="mb-3">

                    <label class="form-label">

                        Deskripsi

                    </label>

                    <textarea name="deskripsi" rows="5" class="form-control">{{ old('deskripsi') }}</textarea>

                </div>

                <button class="btn btn-primary">

                    <i class="bi bi-check-square"></i>

                    Simpan

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
        foto.onchange = evt => {

            const [file] = foto.files;

            if (file) {

                preview.src = URL.createObjectURL(file);

                preview.style.display = 'block';

            }

        }
    </script>
@endpush
